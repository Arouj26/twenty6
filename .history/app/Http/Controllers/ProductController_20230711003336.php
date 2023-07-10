<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Customer;
use App\Models\Orderitem;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Messages;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Carousal;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Header;
use App\Models\Logo;
use App\Models\Footer;
use App\Models\Variant;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all()->toArray();
        $categories= Category::all()->toArray();
        $carousals= Carousal::all()->toArray();
        $banners= Banner::all()->toArray();
        $services= Service::all()->toArray();
        // dd($categories);
        return view('frontend.index')->with(['products'=>$products, 'categories'=>$categories, 'carousals'=>$carousals, 'banners'=>$banners, 'services'=>$services]);
    }
    public function women($category_name){
        $category_name = strtolower($category_name);
        $products = Product::all()->toArray();
        // $categories= Category::all()->toArray();
        // $categories = Category::find($category_name);
        $categories = Category::all();
        return view('frontend.women',compact('category_name', 'products', 'categories'));
    }
    public function products(){
        $products = Product::all()->toArray();
        $variants = Variant::all()->toArray();
        // dd ($variants);
        return view('backend.products')->with(['products'=>$products, 'variants'=>$variants]);
    }

    public function add_products_var(){
        // $categories = Category::all()->toArray();
        return view('backend.add_product_var');
    }
    public function ret_products_var(Request $request)
    {
            $request->validate([
                'nocolors' => 'required',
                'nosizes' => 'required',
            ]);
            $nocolors = $request->input('nocolors');
            $nosizes = $request->input('nosizes');
            $variants_no = [
                'nocolors' => $nocolors,
                'nosizes' => $nosizes,
            ];
            $categories = Category::all()->toArray();
            session()->put('variants_no', $variants_no);
            // dd($variants_no);
            return view('backend.add_products', [
                'variants_no' => $variants_no,
                'categories' => $categories,
            ]);
    }
    public function add_products(){
        $categories = Category::all()->toArray();
        return view('backend.add_products')->with('categories',$categories);
    }

    public function ret_products(Request $request){
        // dd($request->input('product_quantity'));
        $lastproduct_unicode = Product::max('product_unicode');
        $product_unicode = $lastproduct_unicode ? $lastproduct_unicode + 1 : 1;
        $variants_no = session('variants_no');
        // dd($variants_no);
        $request->validate(
            [
                'product_title'=>'required',
                'product_price'=>'required',
                'product_color'=>'required',
                'product_size'=>'required',
                'product_quantity'=>'required',
                'product_category'=>'required',
                'product_image'=>'required',
                'product_code'=>'required',
                'product_description'=>'required',
            ]
            );

            // dd($request->all());
            $image = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->move(public_path('/backend/assets/img/'), $image);
            // $product_unicode=$request->input('product_unicode');
            $product_category=$request->input('product_category');
            $product_feature=$request->input('product_feature');
            $product_image=$request->file('product_image');
            $product_title=$request->input('product_title');
            $product_price=$request->input('product_price');
            $product_code=$request->input('product_code');
            $product_description=$request->input('product_description');
            $total_sizes = $variants_no['nosizes'];
            $total_colors = $variants_no['nocolors'];

            $data=array('product_category'=>$product_category,
            'product_unicode'=>$product_unicode,
            'product_feature'=>$product_feature,
            'product_image' => '/backend/assets/img/' . $image,
            "product_title"=>$product_title,
            "product_price"=>$product_price,
            "product_code"=>$product_code,
            "product_description"=>$product_description,
            "total_sizes"=>$total_sizes,
            "total_colors"=>$total_colors,
        );
            DB::table('products')->insert($data);

            $products = DB::table('products')->get();

            $productsArray = json_decode(json_encode($products), true);

//****************************************** Variants *********************************************

            // $product_unicode = $request->input('product_unicode');
            $product_color = $request->input('product_color');
            $product_size = $request->input('product_size');
            $product_quantity = $request->input('product_quantity');


            for ($i = 0; $i < count($product_color); $i++) {
                $data = [
                    'product_unicode' => $product_unicode,
                    'product_color' => isset($product_color[$i]) ? $product_color[$i] : null,
                    'product_size' => isset($product_size[$i]) ? $product_size[$i] : null,
                    'product_quantity' => isset($product_quantity[$i]) ? $product_quantity[$i] : null,
                ];
                DB::table('variants')->insert($data);
            }
            $variants = DB::table('variants')->get();
            $variantsArray = json_decode(json_encode($variants), true);
            return redirect('/admin/products');
}


    public function view_product($id){

            $products = Product::find($id);
            $variants = Variant::where('product_unicode', $products->product_unicode)->get();
// dd($variants);
            return view('backend.view_product',['products' => $products, 'variants' => $variants]);
    }

        public function ret_view_products(Request $request){
            // dd($request->input('product_quantity'));
        }

    public function edit_product($id){
        $products = Product::find($id)->toArray();
        $category_name = $products['product_category'];
        $category = Category::where('category_name', $category_name)->first();
        $variants = Variant::where('product_unicode', $products['product_unicode'])->get();
        // $variants_no = session('variants_no');
        // dd($variants_no);
        return view('backend.edit_product')->with(['products'=>$products, 'category'=>$category,'variants' => $variants, 'id' => $id,]);
    }

    public function ret_edit_product(Request $request, $id)
{
    $request->validate([
        'product_title' => 'required',
        'product_price' => 'required',
        'product_color' => 'required',
        'product_size' => 'required',
        'product_quantity' => 'required',
        'product_category' => 'required',
        'product_code' => 'required',
        'product_description' => 'required',
    ]);

    // Handle product editing
    $product = Product::find($id);
    $product->product_category = $request->input('product_category');
    $product->product_feature = $request->input('product_feature');
    $product->product_title = $request->input('product_title');
    $product->product_price = $request->input('product_price');
    $product->product_code = $request->input('product_code');
    $product->product_description = $request->input('product_description');

    // Check if a new image is uploaded
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');

        // Delete the old image if it exists
        if ($product->product_image) {
            Storage::delete($product->product_image);
        }

        $imagePath = '/backend/assets/img/' . $image->getClientOriginalName();
        $image->move(public_path('/backend/assets/img/'), $imagePath);
        $product->product_image = $imagePath;
    }

    $product->save();

    // Handle variants editing
    $product_color = $request->input('product_color');
    $product_size = $request->input('product_size');
    $product_quantity = $request->input('product_quantity');

    $variants = Variant::where('product_unicode', $product->product_unicode)->get();

    foreach ($variants as $index => $variant) {
        if (isset($product_color[$index]) && isset($product_size[$index]) && isset($product_quantity[$index])) {
            $variant->product_color = $product_color[$index];
            $variant->product_size = $product_size[$index];
            $variant->product_quantity = $product_quantity[$index];
            $variant->save();
        }
    }

    return redirect()->route('admin.products')->with('success', 'Product updated successfully');
}


public function delete_product($id)
{
    $product = Product::find($id);
    $variants = Variant::where('product_unicode', $product->product_unicode)->get();

    $product->delete();

    foreach ($variants as $variant) {
        $variant->delete();
    }

    return redirect('/admin/products');
}


public function show($id)
{
    $product = Product::find($id);
    $variants = Variant::where('product_unicode', $product->product_unicode)->get();
    return view('frontend.show', ['product' => $product, 'variants' => $variants]);
}

public function cart(){
    $cartItems = session()->get('cart', []);
    $products = Product::whereIn('id', array_keys($cartItems))->get();

    return view('frontend.cart', ['products' => $products]);
}

public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $product = Product::find($productId);
    $variants = Variant::where('product_unicode', $product->product_unicode)->get();
    if (!$product) {
        return back()->with('error', 'Product not found.');
    }
    $customerQuantity = $request->input('customer_quantity');
    $customer_color = $request->color__radio;
    $customer_size = $request->size__radio;
    $cart = session()->get('cart', []);
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $customerQuantity;
    } else {
        $cart[$productId] = [
            'product_id' => $product->id,
            'name' => $product->product_title,
            'price' => $product->product_price,
            'quantity' => $customerQuantity,
            'color' => $customer_color,
            'size' => $customer_size,
            'code' => $product->product_code,
            'category'=>$product->product_category,
        ];
    }
    // dd($cart);
    session()->put('cart', $cart);
    session()->flash('success', 'Item added successfully to the cart!');
    return back()->with('success', 'Product added to cart!');
}
public function addToCartonpage(Request $request)
{
    $productId = $request->input('product_id');
    $product = Product::find($productId);
    $variants = Variant::where('product_unicode', $product->product_unicode)->get();
    $customerQuantity = 1; // Set the quantity as 1
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $customerQuantity;
    } else {
        $cart[$productId] = [
            'product_id' => $product->id,
            'name' => $product->product_title,
            'price' => $product->product_price,
            'quantity' => $customerQuantity,
            'color' => $product->product_color,
            'size' => $product->product_size,
            'code' => $product->product_code,
            'category'=>$product->product_category,
        ];
    }
    // dd($cart);
    session()->put('cart', $cart);
    $request->session()->flash('success', 'Item added successfully to the cart!');

    // Pass the cart and products data to the view
    return redirect()->back()->with('success', 'Item added successfully to the cart!');
}

public function removeItem(Request $request)
{
    $productId = $request->input('product_id');
    $cart = session()->get('cart', []);
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    return redirect()->back()->with('error', 'Item not found in cart.');
}

public function product_display()
{
    $products = Product::all()->toArray(); //take data out of model
        return view('backend.product_display')->with('products',$products);
}

// *******************************Checkout*************************************************

public function checkout(Request $request)
    {
        $cartItems = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cartItems))->get();
        // $variants = Variant::where('product_unicode', $products->product_unicode)->get();
        $total=0;
        if(isset($products[0])){
            foreach ($products as $product) {
                $price = $product["product_price"] * $product->customerQuantity;
                $total += $price;
            }
            $total = $total+200;
            session()->put('total', $total);
        return view('frontend.checkout', ['products' => $products]);

        }else{
        return redirect('/');
        }
    }
    public function ret_checkout(Request $request)
    {
        $cartItems = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cartItems))->get();
        if(isset($products[0])){
            $request->validate(
                [
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'country'=>'required',
                    'address'=>'required',
                    'city'=>'required',
                    'zip'=>'required',
                    'phone'=>'required',
                    'email'=>'required',
                ]
                );
// ****************************Customers Table*********************************************************
                $lastOrderNumber = Customer::max('order_number');
                $orderNumber = $lastOrderNumber ? $lastOrderNumber + 1 : 1;
                $customer = new Customer();
                $customer->order_number = str_pad($orderNumber, 8, '0', STR_PAD_LEFT);
                $customer->first_name = $request->input('first_name');
                $customer->last_name = $request->input('last_name');
                $customer->country = $request->input('country');
                $customer->address = $request->input('address');
                $customer->city = $request->input('city');
                $customer->zip = $request->input('zip');
                $customer->phone = $request->input('phone');
                $customer->email = $request->input('email');
                $customer->notes = $request->input('notes');
                $customer->save();
                session()->put('customer', $customer);

// ****************************Orders Table*********************************************************
        $order = new Order();
        $order->order_number = str_pad($orderNumber, 8, '0', STR_PAD_LEFT);
        $order->customer_name = $request->input('first_name') . ' ' . $request->input('last_name');
        $order->totalbill = session()->get('total');;
        $order->status="Pending";
        $order->save();
        session()->put('order', $order);

// ****************************OrderItems Table*********************************************************
$cart = session()->get('cart', []);
// dd($cart);
foreach ($cart as $cart) {
        $orderItems = new OrderItem();
        $orderItems->order_number = str_pad($orderNumber, 8, '0', STR_PAD_LEFT);
        $orderItems->product_code = $cart['code'];
        $orderItems->product_title = $cart['name'];
        $orderItems->product_size = $cart["size"];
        $orderItems->product_color = $cart["color"];
        $orderItems->product_quantity = $cart['quantity'];
        $orderItems->product_price = $cart['price'];
        $orderItems->product_category = $cart['category'];
        $orderItems->save();
}
$productunicode = $products->pluck('product_unicode');
// dd($productunicode );
foreach ($productunicode as $productunicode) {
    $variants = Variant::where('product_unicode', $productunicode)->get();

    foreach ($variants as $variant) {
        $cartItems = session()->get('cart', []);
        $productIds = array_keys($cartItems);
        $products = Product::whereIn('id', $productIds)->get();

        foreach ($products as $product) {
            if ($variant['product_color'] === $cart['color']) {
                $orderItems = OrderItem::where('id', $product->id)->get();
                $totalQuantity = $orderItems->sum('product_quantity');
                $variant->product_quantity -= $totalQuantity;
                $variant->save();
            }
        }
    }
}

session()->forget('cart');
return redirect('/')->with('products', $products);
        }else{
        return redirect('/');
        }
    }

public function orders(Request $request)
{
    $orders = Order::all()->toArray();
    $customers = Customer::all()->toArray();
    // $orders = session()->get('order', []);
    // dd($orders);
    return view('backend.orders', ['orders' => $orders], ['customers' => $customers]);
}


public function edit_order($id){
    $order = Order::find($id)->toArray();
    return view('backend.edit_order')->with('orders', $order);
}

public function ret_edit_order(Request $request, $id){
    $order = Order::find($id);

   $order->order_number = $request->input('order_number');
   $order->customer_name = $request->input('customer_name');
   $order->totalbill = $request->input('totalbill');
   $order->status = $request->input('status');
   $order->save();
   $orderArray = $order->toArray();
   return redirect()->route('backend.orders')->with('orders', [$orderArray]);
}

public function view_order($id)
{
    $order = Order::find($id)->toArray();
    $orderNumber = $order['order_number'];
    $orderitem = OrderItem::where('order_number', $orderNumber)->get()->toArray();
    $customer = Customer::find($id)->toArray();

    return view('backend.view_order')->with(['customers' => [$customer], 'order' => $order, 'orderitems' => $orderitem, 'orders' => [$order]]);
}


public function category($product_category)
{
    $products = Product::where('product_category', $product_category)->get();
    $categories = ['flatshoes', 'highheels', 'boots'];

    if ($product_category === 'footwear') {
        $products = Product::whereIn('product_category', $categories)->get();
    } else {
        $products = Product::where('product_category', $product_category)->get();
    }
    // dd($products);
    return view('frontend.category', ['products' => $products]);
}

public function blog()
{
    $blogs = Blog::all()->toArray();
    return view('frontend.blog')->with('blogs', $blogs);
}
public function add_blog()
{
    return view('backend.add_blog');
}
public function ret_blog(Request $request){
    $request->validate(
        [
            'blog_title'=>'required',
            'blog_tag'=>'required',
            'blog_author'=>'required',
            'blog_date'=>'required',
            'blog_picture'=>'required',
            'blog_p1'=>'required',
        ]
        );
        // dd($request->all());
        // dd($request->all());
        $image = $request->file('blog_picture')->getClientOriginalName();
        $request->file('blog_picture')->move(public_path('/backend/assets/img/'), $image);


        $blog_title=$request->input('blog_title');
        $blog_picture=$request->file('blog_picture');
        $blog_tag=$request->input('blog_tag');
        $blog_author=$request->input('blog_author');
        $blog_date=$request->input('blog_date');
        $blog_p1=$request->input('blog_p1');
        $blog_p2=$request->input('blog_p2');
        $blog_p3=$request->input('blog_p3');

        $data=array('blog_title'=>$blog_title,
        'blog_picture' => '/backend/assets/img/' . $image,
        "blog_tag"=>$blog_tag,
        "blog_author"=>$blog_author,
        "blog_date"=>$blog_date,
        "blog_p1"=>$blog_p1,
        "blog_p2"=>$blog_p2,
        "blog_p3"=>$blog_p3,
    );
        DB::table('blogs')->insert($data);

        $blogs = DB::table('blogs')->get();

        $blogsArray = json_decode(json_encode($blogs), true);
        return redirect('/admin/blog')->with('blogs', $blogsArray);
}

public function blog_details($id)
    {
        $blog = Blog::where('id', $id)->first();
        // dd($blog);
        return view('frontend.blog_details',['blog'=>$blog]);
    }
public function blog_list()
{
        $blog = Blog::all()->toArray();
        return view('backend.blog',['blog'=>$blog]);
}
public function edit_blog($id){
    $blogs = blog::find($id)->toArray();
    return view('backend.edit_blog')->with('blogs',$blogs);
}

public function ret_edit_blog(Request $request, $id){
    $blog=blog::find($id);
    $blog->blog_title = $request->input('blog_title');
    $blog->blog_tag = $request->input('blog_tag');
    $blog->blog_author = $request->input('blog_author');
    $blog->blog_date = $request->input('blog_date');
    $blog->blog_p1 = $request->input('blog_p1');
    $blog->blog_p2 = $request->input('blog_p2');
    $blog->blog_p3 = $request->input('blog_p3');
    // Check if a new image is uploaded
if ($request->hasFile('blog_picture')) {
    $image = $request->file('blog_picture');

    // Delete the old image if it exists
    if ($blog->blog_picture) {
        Storage::delete($blog->blog_picture);
    }

    $imagePath = '/backend/assets/img/' . $image->getClientOriginalName();
$image->move(public_path('/backend/assets/img/'), $imagePath);
$blog->blog_picture = $imagePath;
}

    $blog->save();

    return redirect()->route('admin.blog')->with('success', 'blog updated successfully');
}
public function delete_blog($id){
    $blogs= Blog::find($id);
    $blogs->delete();
    return redirect('/admin/blog');
}
public function contact()
{
    $latestContact = Contact::latest('id')->first();
    return view('frontend.contact')->with('contact', $latestContact);
}

public function contact_info(){
    return view('backend.contact_info');
}
public function ret_contact_info(Request $request){
    $request->validate(
        [
            'contact_address'=>'required',
            'contact_number'=>'required',
            'contact_email'=>'required',
        ]
        );
        $Address=$request->input('contact_address');
        $Phone=$request->input('contact_number');
        $Email=$request->input('contact_email');

        $data=array('Address'=>$Address,
        "Phone"=>$Phone,
        "Email"=>$Email,
    );
        DB::table('contacts')->insert($data);

        $contacts = DB::table('contacts')->get();

        $contactsArray = json_decode(json_encode($contacts), true);

    return redirect('/admin/contact-info');
}

public function ret_contact(Request $request){
    $request->validate(
        [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]
        );
        $name=$request->input('name');
        $phone=$request->input('phone');
        $email=$request->input('email');
        $message=$request->input('message');
        $status="un-read";

        $data=array('name'=>$name,
        "phone"=>$phone,
        "email"=>$email,
        "message"=>$message,
        "status"=>$status,
    );
        DB::table('messages')->insert($data);

        $messages = DB::table('messages')->get();

        $messagesArray = json_decode(json_encode($messages), true);
    return redirect('/contact');
}

public function messages(){
    $messages=Messages::all()->toArray();
    return view('backend.messages',['messages'=>$messages]);
}

public function view_messages($id)
{
    $messages = messages::find($id)->toArray();

    return view('backend.view_messages')->with('messages',[$messages]);
}

public function ret_view_messages(Request $request, $id)
{
    $messages = Messages::find($id);
    // $messages->name='name';
    // $messages->phone='phone';
    // $messages->email='email';
    // $messages->message='message';
    $messages->status="read";
    $messages->save();
   $messageArray = $messages->toArray();
   return redirect()->route('backend.messages')->with('messages', [$messageArray]);
}

public function admin(){
    $orders=Order::all()->toArray();
    $products=Product::all()->toArray();
    $orderitems=Orderitem::all()->toArray();
    $variants=Variant::all()->toArray();
    $categories=Category::all()->toArray();
    return view('backend.index')->with(['orders' => $orders, 'products' => $products, 'orderitems'=>$orderitems,'variants'=>$variants,'categories'=>$categories]);
}

public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Perform the search query using the input search term
        $results = Product::where('product_title', 'like', "%$searchTerm%")
            ->orWhere('product_category', 'like', "%$searchTerm%")
            ->get();

        return view('backend.search', compact('results', 'searchTerm'));
    }

    public function systemsettings()
    {
        return view('backend.systemsettings');
    }
    public function ret_systemsettings(Request $request)
    {$request->validate(
        [
            'brand_title'=>'required',
            'brand_favicon'=>'required',

        ]
        );
        $image = $request->file('brand_favicon')->getClientOriginalName();
        $request->file('brand_favicon')->move(public_path('/backend/assets/img/'), $image);
        $brand_name=$request->input('brand_title');
        $brand_logo=$request->file('brand_favicon');
        $data=array('brand_name'=>$brand_name,
        'brand_logo' => '/backend/assets/img/' . $image,
    );
        DB::table('brands')->insert($data);

        $brands = DB::table('brands')->get();

        $brandsArray = json_decode(json_encode($brands), true);
        return redirect('/admin/systemsettings');
    }
    public function homesettings()
    {
        $categories = Category::all()->toArray();
        $carousals = Carousal::all()->toArray();
        $services = Service::all()->toArray();
        $footers = Footer::all()->toArray();
        // dd($categories);
        return view('backend.homesettings')->with(['categories'=>$categories, 'carousals'=>$carousals, 'services'=>$services, 'footers'=>$footers]);
    }
    public function categories()
    {
        return view('backend.categories');
    }
    public function ret_categories(Request $request)
{
    $request->validate(
        [
            'category_name'=>'required',
            'category_image'=>'required',
            'category_display_title'=>'required',
        ]
        );

        // dd($request->all());
        $image = $request->file('category_image')->getClientOriginalName();
        $request->file('category_image')->move(public_path('/backend/assets/img/'), $image);

        $category_name=$request->input('category_name');
        $category_image=$request->file('category_image');
        $is_first=$request->input('is_first?');
        $category_display_title=$request->input('category_display_title');

        $data=array('category_name'=>$category_name,
        'category_image' => '/backend/assets/img/' . $image,
        'is_first'=>$is_first,
        'category_display_title'=>$category_display_title,
    );
        DB::table('categories')->insert($data);

        $categories = DB::table('categories')->get();

        $categoriesArray = json_decode(json_encode($categories), true);

        return redirect('admin/homesettings')->with('categories', $categoriesArray);
    }
    public function edit_category($id){
        $categories = Category::find($id)->toArray();
        return view('backend.edit_category')->with('categories',$categories);
    }

    public function ret_edit_category(Request $request, $id){
        $category=category::find($id);
        $category->category_name = $request->input('category_name');
    if ($request->hasFile('category_image')) {
        $image = $request->file('category_image');

        // Delete the old image if it exists
        if ($category->category_image) {
            Storage::delete($category->category_image);
        }

        $imagePath = '/backend/assets/img/' . $image->getClientOriginalName();
    $image->move(public_path('/backend/assets/img/'), $imagePath);
    $category->category_image = $imagePath;
    }

        $category->save();

        return redirect('/admin/homesettings')->with('success', 'category updated successfully');
    }
    public function delete_category($id){
        $categories= Category::find($id);
        $categories->delete();
        return redirect('/admin/homesettings');
    }

    public function carousals()
    {
        return view('backend.carousals');
    }
    public function ret_carousals(Request $request)
{
    $request->validate(
        [
            'carousal_tag'=>'required',
            'carousal_text'=>'required',
        ]
        );
        $carousal_tag=$request->input('carousal_tag');
        $carousal_text=$request->input('carousal_text');

        $data=array('carousal_tag'=>$carousal_tag,
        'carousal_text'=>$carousal_text,
    );
        DB::table('carousals')->insert($data);

        $carousals = DB::table('carousals')->get();

        $carousalsArray = json_decode(json_encode($carousals), true);

        return redirect('admin/homesettings')->with('carousals', $carousalsArray);
    }
    public function edit_carousal($id){
        // dd($id);
        $carousals = Carousal::find($id)->toArray();
        return view('backend.edit_carousal')->with('carousals',$carousals);
    }

    public function ret_edit_carousal(Request $request, $id){
        $carousal=Carousal::find($id);
        $carousal->carousal_tag = $request->input('carousal_tag');
        $carousal->carousal_text = $request->input('carousal_text');
        $carousal->save();

        return redirect('/admin/homesettings')->with('success', 'category updated successfully');
    }
    public function delete_carousal($id){
        $carousals= Carousal::find($id);
        $carousals->delete();
        return redirect('/admin/homesettings');
    }
    public function banners()
    {
        return view('backend.banner');
    }
    public function ret_banners(Request $request)
{
    $request->validate(
        [
            'banner'=>'required',
        ]
        );

    // dd($request->all());
    $image = $request->file('banner')->getClientOriginalName();
    $request->file('banner')->move(public_path('/backend/assets/img/'), $image);
    $banner=$request->file('banner');

    $data=array(
    'banner' => '/backend/assets/img/' . $image,);
    DB::table('banners')->insert($data);
    $banners = DB::table('banners')->get();
    $bannersArray = json_decode(json_encode($banners), true);
        return redirect('admin/homesettings')->with('banners', $bannersArray);
}
public function services()
    {
        return view('backend.services');
    }
public function ret_services(Request $request)
{
    $request->validate(
        [
            'service_name'=>'required',
            'service_description'=>'required',
        ]
        );

    // dd($request->all());
    if ($request->hasFile('service_image')) {
        $image = $request->file('service_image')->getClientOriginalName();
        $request->file('service_image')->move(public_path('/backend/assets/img/'), $image);
        $service_image = '/backend/assets/img/' . $image;
    } else {
        $service_image = '0'; // Set a default value if no image is uploaded
    }
    $service_description=$request->input('service_description');
    $service_icon=$request->input('service_icon');
    $service_name=$request->input('service_name');
    $data=array('service_name'=>$service_name,
    'service_description'=>$service_description,
    'service_icon'=>$service_icon,
    'service_image' => $service_image);
    DB::table('services')->insert($data);
    $services = DB::table('services')->get();
    $servicesArray = json_decode(json_encode($services), true);
        return redirect('admin/homesettings')->with('services', $servicesArray);
}
public function delete_service($id){
    $services= Service::find($id);
    $services->delete();
    return redirect('/admin/homesettings');
}
public function header(){
    $categories = Category::all()->toArray();
    return view('backend.header')->with(['categories'=>$categories]);
}
public function ret_header(Request $request)
{
    $headers = [];
    $categories = Category::all()->toArray();
    $headers[] = [
        'header_name' => 'Home',
        'is_checked' => $request->has('home'),
    ];
    foreach ($categories as $category) {
        $headers[] = [
            'header_name' => $category['category_name'],
            'is_checked' => $request->has($category['category_name']),
        ];
    }
    $headers[] = [
        'header_name' => 'Blog',
        'is_checked' => $request->has('blog'),
    ];

    $headers[] = [
        'header_name' => 'Contact',
        'is_checked' => $request->has('contact'),
    ];
// dd($headers);
    Header::truncate(); // Clear existing menu settings (optional)

    foreach ($headers as $header) {
        Header::create($header);
    }

    return redirect('/admin/homesettings')->with(['categories' => $categories]);
}
public function ret_logo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            Logo::truncate();
            $image = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('/backend/assets/img/'), $image);

            $logo = new Logo();
            $logo->logo = '/backend/assets/img/' . $image;
            $logo->save();

            return redirect()->back()->with('success', 'Logo uploaded successfully!');

        }

        return redirect()->back()->with('error', 'Logo upload failed!');
    }

    public function footer()
    {
        return view('backend.footer');
    }
    public function ret_footer(Request $request)
{
    $request->validate(
        [
            'footer_insta'=>'required',
            'footer_image'=>'required',
        ]
        );
        $image = $request->file('footer_image')->getClientOriginalName();
        $request->file('footer_image')->move(public_path('/backend/assets/img/'), $image);

        $footer_insta=$request->input('footer_insta');
        $footer_image=$request->file('footer_image');

        $data=array('footer_insta'=>$footer_insta,
        'footer_image' => '/backend/assets/img/' . $image,
    );
        DB::table('footers')->insert($data);

        $footer = DB::table('footers')->get();

        $footerArray = json_decode(json_encode($footer), true);

        return redirect('admin/homesettings')->with('footer', $footerArray);
    }
    public function edit_footer($id){
        // dd($id);
        $footer = Footer::find($id)->toArray();
        return view('backend.edit_footer')->with('footer',$footer);
    }

    public function ret_edit_footer(Request $request, $id){
        $footer=footer::find($id);
        // $footer->footer_insta = $request->input('footer_insta');
        if ($request->hasFile('footer_image')) {
            $image = $request->file('footer_image');

            // Delete the old image if it exists
            if ($footer->footer_image) {
                Storage::delete($footer->footer_image);
            }

            $imagePath = '/backend/assets/img/' . $image->getClientOriginalName();
        $image->move(public_path('/backend/assets/img/'), $imagePath);
        $footer->footer_image = $imagePath;
        }
        $footer->save();

        return redirect('/admin/homesettings')->with('success', 'footer updated successfully');
    }
    public function delete_footer($id){
        $footer= footer::find($id);
        $footer->delete();
        return redirect('/admin/homesettings');
    }
    public function account_settings(){
        $admin=User::all()->toArray();
        // dd($admin);
        return view('backend.account_settings')->with('admin',$admin);
    }
    public function cartsettings(){
        $shipping = Cart::all()->toArray();
        return view('backend.cartsettings')->with(['shipping'=>$shipping]);
    }
    public function ret_cartsettings(Request $request)
    {$request->validate(
        [
            'shipping'=>'required',
        ]
        );
        $shipping=$request->input('shipping');
        $data=array('Shipping'=>$shipping,
    );
        DB::table('carts')->insert($data);

        $shipping = DB::table('carts')->get();

        $shippingArray = json_decode(json_encode($shipping), true);
        return redirect('/admin/cartsettings')->with(['shipping' => $shipping]);
    }
}
