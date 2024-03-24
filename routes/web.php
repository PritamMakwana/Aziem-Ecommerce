<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MyReceiptController;
use App\Http\Controllers\ShopOwnerController;
use App\Http\Controllers\MyCustomerController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminPasswordController;
use App\Http\Controllers\ShopOwnerAuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\JobRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Frontend
Route::get('/Stores', [FrontEndController::class, 'listShops/{id?}'])->name('Stores')->middleware('shop.owner');
Route::get('/view-store/{id}', [FrontEndController::class, 'viewStore'])->name('view-store')->middleware('auth.customer');

//forget password

// Route::get('/email-verify-page', [ForgetPasswordController::class, 'emailVerifyPage'])->name('email-verify-page');

// Route::post('/email-verify', [ForgetPasswordController::class, 'emailVerify'])->name('email-verify');

// Route::get('/send-otp/{id}', [ForgetPasswordController::class, 'sendOtp'])->name('send-otp');

// Route::post('/send-otp-data', [ForgetPasswordController::class, 'sendOtpData'])->name('send-otp-data');

// Customer
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
// Route::get('/customer/register', [CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::get('/my-account/{id}', [MyCustomerController::class, 'myAccount'])->middleware('auth.customer');
Route::post('update-profile', [MyCustomerController::class, 'updateProfile'])->name('update-profile');
Route::get('/my-receipts/{id}', [MyCustomerController::class, 'myReceipts'])->name('my-receipts')->middleware('auth.customer');
Route::post('/upload-receipt', [MyCustomerController::class, 'uploadReceipt'])->name('upload-receipt')->middleware('auth.customer');

// Shop Owner
Route::post('/shop_owner/login', [ShopOwnerAuthController::class, 'login'])->name('shop_owner.login');
Route::post('/shop_owner/logout', [ShopOwnerAuthController::class, 'logout'])->name('shop_owner.logout');
Route::post('/shop_owner/register', [ShopOwnerAuthController::class, 'register'])->name('shop_owner.register');
Route::get('/otp/verify', [ShopOwnerAuthController::class, 'showOtpVerifyForm'])->name('otp.verify');
Route::post('/otp/verify', [ShopOwnerAuthController::class, 'verifyOtp']);
Route::post('/otp/resend', [ShopOwnerAuthController::class, 'resendOtp'])->name('otp.resend');
Route::get('/show-success-modal', [ShopOwnerAuthController::class, 'showSuccessModal'])->name('show-success-modal');
Route::get('/so-home/{id}', [FrontEndController::class, 'homeShopOwner'])->name('so-home')->middleware('auth.shop_owner');
Route::get('/my_profile/{id}', [ShopOwnerController::class, 'myProfile'])->name('my-profile')->middleware('auth.shop_owner');
Route::post('/update_my_profile', [ShopOwnerController::class, 'updateMyProfile'])->name('update-my-profile')->middleware('auth.shop_owner');
Route::get('/update-status/{id}', [ShopOwnerController::class, 'changeStatus'])->name('change-status')->middleware('auth.shop_owner');
Route::get('/product_list/{id}', [ShopOwnerController::class, 'productList'])->name('product-list')->middleware('auth.shop_owner');
Route::get('/product_delete/{id}', [ShopOwnerController::class, 'delProduct'])->name('product-delete')->middleware('auth.shop_owner');
Route::get('/product_details/{id}', [ShopOwnerController::class, 'productDetails'])->name('product-details')->middleware('auth.shop_owner');
Route::post('/update_product_details', [ShopOwnerController::class, 'updateProductDetails'])->name('update-product-details')->middleware('auth.shop_owner');
Route::get('/new-product/{id}', [ShopOwnerController::class, 'newProduct'])->name('new-product')->middleware('auth.shop_owner');
Route::post('/create-product', [ShopOwnerController::class, 'createProduct'])->name('create-product')->middleware('auth.shop_owner');
Route::get('/order-list/{id}', [ShopOwnerController::class, 'orderList'])->name('order-list')->middleware('auth.shop_owner');
Route::post('/search', [ShopOwnerController::class, 'search'])->name('search')->middleware('auth.shop_owner');
Route::post('/confirm-amount', [ShopOwnerController::class, 'confirmAmount'])->name('confirm-amount')->middleware('auth.shop_owner');
Route::get('/customer-list/{id}', [ShopOwnerController::class, 'customerList'])->name('customer-list')->middleware('auth.shop_owner');

//job
Route::post('/job/register', [JobRegistrationController::class, 'register'])->name('job.register');
// Cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth.customer');
// Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
// Route::get('/cart/remove/{product_id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/{id}', [CartController::class, 'viewCart'])->name('cart.view')->middleware('auth.customer');
Route::post('/confirm-order', [CartController::class, 'confirmOrder'])->name('confirm.order')->middleware('auth.customer');
Route::get('/cart/delete/{cartItemId}', [CartController::class, 'deleteCartItem'])->name('cart.delete');

// Receipt
Route::get('/download-receipt/{shop_id}', [ReceiptController::class, 'downloadReceipt'])->name('receipt.download');
Route::get('/generate-receipt/{order_id}', [ReceiptController::class, 'downloadCardReceipt'])->name('generate-receipt');
Route::get('/generate-shop-receipt/{order_id}', [ReceiptController::class, 'downloadShopReceipt'])->name('generate-shop-receipt');
Route::get('/get-shop-riyal-receipt/{id}', [ReceiptController::class, 'getShopRiyalReceipt'])->name('get-shop-riyal-receipt');

Route::get('/shop-receipt/{order_id}', [ShopOwnerController::class, 'shopReceipt'])->name('shop-receipt')->middleware('auth.shop_owner');

//Other Pages
Route::get('/about', function () {
    return view('frontend.layouts.about');
});

Route::get('/contact', function () {
    return view('frontend.layouts.contact');
})->name('contact');

Route::post('/contact', [FrontEndController::class, 'submitContactForm'])->name('contact.submit');

Route::get('/customer-service', function () {
    return view('frontend.layouts.customer-shop-service');
});

Route::get('/our-services', function () {
    return view('frontend.layouts.our-services');
});


Route::get('/term-and-service', function () {
    return view('frontend.layouts.term-and-service');
})->name('term-and-service');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Category
    Route::get('/list-categories', [categoryController::class, 'listCategories'])->name('list-categories');

    Route::get('/add-category', [categoryController::class, 'addCategory'])->name('add-category');
    Route::post('/insert-category', [categoryController::class, 'insertCategory'])->name('insert-category');

    Route::get('/edit-category/{id}', [categoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/update-category', [categoryController::class, 'updateCategory'])->name('update-category');

    Route::get('/delete-category/{id}', [categoryController::class, 'deleteCategory'])->name('delete-category');
    Route::get('/force-delete-category/{id}', [categoryController::class, 'forceDeleteCategory'])->name('force-delete-category');
    Route::get('/delete-all-category', [categoryController::class, 'deleteAllCategory'])->name('delete-all-category');

    Route::get('restore-category/{id}', [categoryController::class, 'restoreCategory'])->name('restore-category');
    Route::get('restore-all-category', [categoryController::class, 'restoreAllCategory'])->name('restore-all-category');

    // Offers
    Route::get('/list-offers', [OfferController::class, 'listOffers'])->name('list-offers');

    Route::get('/add-offer', [OfferController::class, 'addOffer'])->name('add-offer');
    Route::post('/insert-offer-data', [OfferController::class, 'insertOffer'])->name('insert-offer-data');

    Route::get('/edit-offer/{id}', [OfferController::class, 'editOffer'])->name('edit-offer');
    Route::post('/update-offer', [OfferController::class, 'updateOffer'])->name('update-offer');

    Route::get('/delete-offer/{id}', [OfferController::class, 'deleteOffer'])->name('delete-offer');
    Route::get('/force-delete-offer/{id}', [OfferController::class, 'forceDeleteOffer'])->name('force-delete-offer');
    Route::get('/delete-all-offer', [OfferController::class, 'deleteAllOffer'])->name('delete-all-offer');

    Route::get('restore-offer/{id}', [OfferController::class, 'restoreOffer'])->name('restore-offer');
    Route::get('restore-all-offer', [OfferController::class, 'restoreAllOffer'])->name('restore-all-offer');

    // Shops
    Route::get('/list-shops', [ShopController::class, 'listShops'])->name('list-shops');

    Route::get('/add-shop', [ShopController::class, 'addShop'])->name('add-shop');
    Route::post('/insert-shop', [ShopController::class, 'insertShop'])->name('insert-shop');

    Route::get('/edit-shop/{id}', [ShopController::class, 'editShop'])->name('edit-shop');
    Route::post('/update-shop', [ShopController::class, 'updateShop'])->name('update-shop');

    Route::get('/delete-shop/{id}', [ShopController::class, 'deleteShop'])->name('delete-shop');
    Route::get('/force-delete-shop/{id}', [ShopController::class, 'forceDeleteShop'])->name('force-delete-shop');
    Route::get('/delete-all-shop', [ShopController::class, 'deleteAllShop'])->name('delete-all-shop');

    Route::get('restore-shop/{id}', [ShopController::class, 'restoreShop'])->name('restore-shop');
    Route::get('restore-all-shop', [ShopController::class, 'restoreAllShop'])->name('restore-all-shop');

    Route::post('/update-shop-status/{shop}', [ShopController::class, 'updateStatus'])->name('update-shop-status');

    // Products
    Route::get('/list-products', [ProductController::class, 'listProducts'])->name('list-products');

    Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/insert-product', [ProductController::class, 'insertProduct'])->name('insert-product');

    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('update-product');

    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
    Route::get('/force-delete-product/{id}', [ProductController::class, 'forceDeleteProduct'])->name('force-delete-product');
    Route::get('/delete-all-product', [ProductController::class, 'deleteAllProduct'])->name('delete-all-product');

    Route::get('restore-product/{id}', [ProductController::class, 'restoreProduct'])->name('restore-product');
    Route::get('restore-all-product', [ProductController::class, 'restoreAllProduct'])->name('restore-all-product');

    // Receipts
    Route::get('/list-receipts', [MyReceiptController::class, 'listReceipts'])->name('list-receipts');
    Route::get('/approve-receipt/{id}', [MyReceiptController::class, 'approveReceipt'])->name('approve-receipt');

    // Cutomers
    Route::get('/list-customers', [CustomerController::class, 'listCustomers'])->name('list-customers');
    Route::get('/add-riyal/{id}', [CustomerController::class, 'addRiyal'])->name('add-riyal');
    Route::post('/insert-offer/{id}', [CustomerController::class, 'insertOffer'])->name('insert-offer');
    Route::post('/insert-offer-all', [CustomerController::class, 'insertOfferAll'])->name('insert-offer-all');
    Route::get('/add-riyal-all', [CustomerController::class, 'addRiyalAll'])->name('add-riyal-all');

    Route::get('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete-customer');
    Route::get('/force-delete-customer/{id}', [CustomerController::class, 'forceDeleteCustomer'])->name('force-delete-customer');
    Route::get('/delete-all-customers', [CustomerController::class, 'deleteAllCustomer'])->name('delete-all-customers');
    Route::get('restore-customer/{id}', [CustomerController::class, 'restoreCustomer'])->name('restore-customer');
    Route::get('restore-all-customer', [CustomerController::class, 'restoreAllCustomer'])->name('restore-all-customer');
    Route::get('/customer_hold/{id}', [CustomerController::class,'customerHold']);

    // Shop Owners
    Route::get('/list-shop_owners', [ShopOwnerController::class, 'listShopOwners'])->name('list-shop_owners');
    Route::get('/approve-so/{id}', [ShopOwnerController::class, 'approveShopOwner'])->name('approve.so');
    Route::get('/shop_hold/{id}', [ShopOwnerController::class, 'shopHold']);

    Route::get('/delete-shop-owner/{id}', [ShopOwnerController::class, 'deleteShopOwner'])->name('delete-shop-owner');
    Route::get('/force-delete-shop-owner/{id}', [ShopOwnerController::class, 'forceDeleteShopOwner'])->name('force-delete-shop-owner');
    Route::get('/delete-all-shop-owners', [ShopOwnerController::class, 'deleteAllShopOwners'])->name('delete-all-shop-owners');
    Route::get('restore-shop-owner/{id}', [ShopOwnerController::class, 'restoreShopOwner'])->name('restore-shop-owner');
    Route::get('restore-all-shop-owners', [ShopOwnerController::class, 'restoreAllShopOwners'])->name('restore-all-shop-owners');

    // Job Registration
    Route::get('/job', [JobRegistrationController::class, 'listJob'])->name('list-job');
    Route::get('/job/download/{id}', [JobRegistrationController::class, 'jobCvDownload'])->name('job-cv-download');

    //order show
    Route::get('/list-confirm-order', [OrderController::class, 'listConfirmOrder'])->name('list-confirm-order');
    // Route::get('/approve-so/{id}', [ShopOwnerController::class, 'approveShopOwner'])->name('approve.so');


    Route::get('/delete-confrim-order/{id}', [OrderController::class, 'deleteOrder'])->name('delete-confrim-order');
    Route::get('/force-delete-confrim-order/{id}', [OrderController::class, 'forceDeleteOrder'])->name('force-delete-confrim-order');
    Route::get('/delete-all-confrim-orders', [OrderController::class, 'deleteAllOrder'])->name('delete-all-confrim-orders');

    Route::get('restore-confrim-order/{id}', [OrderController::class, 'restoreOrder'])->name('restore-confrim-order');
    Route::get('restore-all-confrim-orders', [OrderController::class, 'restoreAllOrder'])->name('restore-all-confrim-orders');

    //Enquiry
    Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.show');
    Route::get('enquiry/destroy/{id}', [EnquiryController::class, 'destroy'])->name('enquiry.delete');

});

//admin forget password
Route::get('/admin-otp-page', [AdminPasswordController::class, 'adminOtpPage'])->name('admin-otp-page');

Route::post('/admin-send-otp-data', [AdminPasswordController::class, 'adminSendOtpData'])->name('admin-send-otp-data');

Route::get('/admin-forget-pwd-page', [AdminPasswordController::class, 'adminForgetPwdPage'])->name('admin-forget-pwd-page');

Route::post('/admin-forget-pwd-data', [AdminPasswordController::class, 'adminForgetPwdData'])->name('admin-forget-pwd-data');
