<?php

use App\Http\Controllers\Account\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\bonds\BondsController as BondsBondsController;
use App\Http\Controllers\BondsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DalalController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\Dealers\BillController as DealersBillController;
use App\Http\Controllers\Farmers\BillController as FarmersBillController;
use App\Http\Controllers\Dealers\BondsController as DealersBondsController;
use App\Http\Controllers\Farmers\BondsController as FarmersBondsController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Revenues\RevenuesController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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

Route::get('test2', function () {
	Storage::disk('local')->put('/صور الهوية' . '/' . auth()->user()->id . '/التجار' . '/example.txt', 'Contents');
});

Route::get('/', function () {
	return redirect()->to('/dashboard');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/forget',  function () {
	return view('pages.forgot-password');
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::group(['middleware' => 'auth'], function () {
	// logout route
	Route::get('/logout', [LoginController::class, 'logout']);
	Route::get('/clear-cache', [HomeController::class, 'clearCache']);

	// dashboard route  
	Route::get('/dashboard', function () {
		return view('pages.dashboard');
	})->name('dashboard');

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function () {
		Route::get('/users', [UserController::class, 'index']);
		Route::get('/user/get-list', [UserController::class, 'getUserList']);
		Route::get('/user/create', [UserController::class, 'create']);
		Route::post('/user/create', [UserController::class, 'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class, 'edit']);
		Route::post('/user/update', [UserController::class, 'update']);
		Route::get('/user/delete/{id}', [UserController::class, 'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_role|manage_user'], function () {
		Route::get('/roles', [RolesController::class, 'index']);
		Route::get('/role/get-list', [RolesController::class, 'getRoleList']);
		Route::post('/role/create', [RolesController::class, 'create']);
		Route::get('/role/edit/{id}', [RolesController::class, 'edit']);
		Route::post('/role/update', [RolesController::class, 'update']);
		Route::get('/role/delete/{id}', [RolesController::class, 'delete']);
	});


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function () {
		Route::get('/permission', [PermissionController::class, 'index']);
		Route::get('/permission/get-list', [PermissionController::class, 'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class, 'create']);
		Route::get('/permission/update', [PermissionController::class, 'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class, 'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class, 'getPermissionBadgeByRole']);


	// permission examples
	Route::get('/permission-example', function () {
		return view('permission-example');
	});
	// API Documentation
	Route::get('/rest-api', function () {
		return view('api');
	});
	// Editable Datatable
	Route::get('/table-datatable-edit', function () {
		return view('pages.datatable-editable');
	});

	// Themekit demo pages
	Route::get('/calendar', function () {
		return view('pages.calendar');
	});
	Route::get('/charts-amcharts', function () {
		return view('pages.charts-amcharts');
	});
	Route::get('/charts-chartist', function () {
		return view('pages.charts-chartist');
	});
	Route::get('/charts-flot', function () {
		return view('pages.charts-flot');
	});
	Route::get('/charts-knob', function () {
		return view('pages.charts-knob');
	});
	Route::get('/forgot-password', function () {
		return view('pages.forgot-password');
	});
	Route::get('/form-addon', function () {
		return view('pages.form-addon');
	});
	Route::get('/form-advance', function () {
		return view('pages.form-advance');
	});
	Route::get('/form-components', function () {
		return view('pages.form-components');
	});
	Route::get('/form-picker', function () {
		return view('pages.form-picker');
	});
	Route::get('/invoice', function () {
		return view('pages.invoice');
	});
	Route::get('/layout-edit-item', function () {
		return view('pages.layout-edit-item');
	});
	Route::get('/layouts', function () {
		return view('pages.layouts');
	});

	Route::get('/navbar', function () {
		return view('pages.navbar');
	});
	Route::get('/profile', function () {
		return view('pages.profile');
	});
	Route::get('/project', function () {
		return view('pages.project');
	});
	Route::get('/view', function () {
		return view('pages.view');
	});

	Route::get('/table-bootstrap', function () {
		return view('pages.table-bootstrap');
	});
	Route::get('/table-datatable', function () {
		return view('pages.table-datatable');
	});
	Route::get('/taskboard', function () {
		return view('pages.taskboard');
	});
	Route::get('/widget-chart', function () {
		return view('pages.widget-chart');
	});
	Route::get('/widget-data', function () {
		return view('pages.widget-data');
	});
	Route::get('/widget-statistic', function () {
		return view('pages.widget-statistic');
	});
	Route::get('/widgets', function () {
		return view('pages.widgets');
	});

	// themekit ui pages
	Route::get('/alerts', function () {
		return view('pages.ui.alerts');
	});
	Route::get('/badges', function () {
		return view('pages.ui.badges');
	});
	Route::get('/buttons', function () {
		return view('pages.ui.buttons');
	});
	Route::get('/cards', function () {
		return view('pages.ui.cards');
	});
	Route::get('/carousel', function () {
		return view('pages.ui.carousel');
	});
	Route::get('/icons', function () {
		return view('pages.ui.icons');
	});
	Route::get('/modals', function () {
		return view('pages.ui.modals');
	});
	Route::get('/navigation', function () {
		return view('pages.ui.navigation');
	});
	Route::get('/notifications', function () {
		return view('pages.ui.notifications');
	});
	Route::get('/range-slider', function () {
		return view('pages.ui.range-slider');
	});
	Route::get('/rating', function () {
		return view('pages.ui.rating');
	});
	Route::get('/session-timeout', function () {
		return view('pages.ui.session-timeout');
	});
	Route::get('/pricing', function () {
		return view('pages.pricing');
	});
});


Route::get('/register', function () {
	return view('pages.register');
});
Route::get('/login-1', function () {
	return view('pages.login');
});
Route::get('/welcome', function () {
	return view('main_page.index');
});


Route::group(['middleware' => 'auth'], function () {

	// كشف حساب مفصل
	route::get("/bonds/Account/{id}", [BondsBondsController::class, 'getBonds'])->name('getBondAccount');

	// كشف  حساب المديونات
	route::get("/Account/dept", [AccountController::class, 'getDeptAccount'])->name('getDeptAccount');

	// كشف حساب بالاصناف
	route::get("/Account/item", [AccountController::class, 'getItemAccount'])->name('getItemAccount');

	// كشف حساب لجميع الحسابات
	route::get("/All/Account/", [AccountController::class, 'getAllAccount'])->name('getAllAccount');



	// الإيرادات / السعي
	route::get("/Revenue/quest", [RevenuesController::class, 'getQuest'])->name('Revenue.quest');

	// الإيرادات / العقد
	route::get("/Revenue/contract", [RevenuesController::class, 'getContract'])->name('Revenue.contract');

	// الإيرادات / الرسوم
	route::get("/Revenue/fee", [RevenuesController::class, 'getFee'])->name('Revenue.fee');

	/******     Leader      *******/
	Route::group(['middleware' => 'leader'], function () {


		route::get("/addCompany", [CompanyController::class, 'add'])->name('addCompany');
		route::post("/storeCompany", [CompanyController::class, 'store'])->name('storeCompany');
		route::get("/editCompany/{id}", [CompanyController::class, 'edit'])->name('editCompany');
		route::post("/updateCompany/{id}", [CompanyController::class, 'update'])->name('updateCompany');
		route::get("/deleteCompany/{id}", [CompanyController::class, 'delete'])->name('deleteCompany');
		route::get("/showCompany", [CompanyController::class, 'show'])->name('showCompany');
	});

	/******     company and Writer     *******/

	Route::group(['middleware' => 'Company_Writer_Middleware'], function () {
		route::get("/showD", [DalalController::class, 'show'])->name('showDalals');

		route::get("/showDealers", [DealerController::class, 'show'])->name('showDealers');
		route::get("/showFarmers", [FarmerController::class, 'show'])->name('showFarmers');

		//read
		route::group(["middleware" => "role:2,'read'"], function () {
		});
		//read
		route::group(["middleware" => "role:4,'read'"], function () {
		});

		//read
		route::group(["middleware" => "role:3,'read'"], function () {
		});
	});


	Route::group(['middleware' => 'company'], function () {

		/******************************************************/

		//writer


		//write
		route::group(["middleware" => "role:1,'write'"], function () {

			route::get("/addWriter", [WriterController::class, 'add'])->name('addWriter');
			route::post("/storeWriter", [WriterController::class, 'store'])->name('storeWriter');
			route::get("/editWriter/{id}", [WriterController::class, 'edit'])->name('editWriter');
			route::post("/updateWriter/{id}", [WriterController::class, 'update'])->name('updateWriter');
		});

		//Delete 
		route::group(["middleware" => "role:1,'delete'"], function () {
			route::get("/deleteWriter/{id}", [WriterController::class, 'delete'])->name('deleteWriter');
		});


		//Read 
		route::group(["middleware" => "role:1,'read'"], function () {
			route::get("/showWriters", [WriterController::class, 'show'])->name('showWriters');
		});

		/******************************************************/

		//Dalal


		//write
		route::group(["middleware" => "role:2,'write'"], function () {

			route::get("/addDalal", [DalalController::class, 'add'])->name('addDalal');
			route::post("/storeDalal", [DalalController::class, 'store'])->name('storeDalal');
			route::get("/editDalal/{id}", [DalalController::class, 'edit'])->name('editDalal');
			route::post("/updateDalal/{id}", [DalalController::class, 'update'])->name('updateDalal');
		});



		//delete
		route::group(["middleware" => "role:2,'delete'"], function () {
			route::get("/deleteDalal/{id}", [DalalController::class, 'delete'])->name('deleteDalal');
		});





		/******************************************************/

		//Farmer

		//write
		route::group(["middleware" => "role:3,'write'"], function () {

			route::get("/addFarmer", [FarmerController::class, 'add'])->name('addFarmer');
			route::post("/storeFarmer", [FarmerController::class, 'store'])->name('storeFarmer');
			route::get("/editFarmer/{id}", [FarmerController::class, 'edit'])->name('editFarmer');
			route::post("/updateFarmer/{id}", [FarmerController::class, 'update'])->name('updateFarmer');
		});

		//delete
		route::group(["middleware" => "role:3,'delete'"], function () {
			route::get("/deleteFarmer/{id}", [FarmerController::class, 'delete'])->name('deleteFarmer');
		});


		/******************************************************/

		//Dealer
		route::group(["middleware" => "role:4,'write'"], function () {

			route::get("/addDealer", [DealerController::class, 'add'])->name('addDealer');
			route::post("/storeDealer", [DealerController::class, 'store'])->name('storeDealer');
			route::get("/editDealer/{id}", [DealerController::class, 'edit'])->name('editDealer');
			route::post("/updateDealer/{id}", [DealerController::class, 'update'])->name('updateDealer');
		});
		//delete
		route::group(["middleware" => "role:4,'delete'"], function () {
			route::get("/deleteDealer/{id}", [DealerController::class, 'delete'])->name('deleteDealer');
		});

		/******************************************************/

		//Worker
		route::get("/addWorker", [WorkerController::class, 'add'])->name('addWorker');
		route::post("/storeWorker", [WorkerController::class, 'store'])->name('storeWorker');
		route::get("/editWorker/{id}", [WorkerController::class, 'edit'])->name('editWorker');
		route::post("/updateWorker/{id}", [WorkerController::class, 'update'])->name('updateWorker');
		route::get("/deleteWorker/{id}", [WorkerController::class, 'delete'])->name('deleteWorker');
		route::get("/showWorkers", [WorkerController::class, 'show'])->name('showWorkers');

		/******************************************************/


		//Mot3aked
		route::get("/addMot3aked", [Mot3akedController::class, 'add'])->name('addMot3aked');
		route::post("/storeMot3aked", [Mot3akedController::class, 'store'])->name('storeMot3aked');
		route::get("/editMot3aked/{id}", [Mot3akedController::class, 'edit'])->name('editMot3aked');
		route::post("/updateMot3aked/{id}", [Mot3akedController::class, 'update'])->name('updateMot3aked');
		route::get("/deleteMot3aked/{id}", [Mot3akedController::class, 'delete'])->name('deleteMot3aked');
		route::get("/showMot3akeds", [Mot3akedController::class, 'show'])->name('showMot3akeds');

		/******************************************************/



		/******************************************************/

		//Dates 
		//write
		route::group(["middleware" => "role:6,'write'"], function () {
			Route::post('storeDate',  [DateController::class, 'store'])->name('storeDate');
			Route::get('editDate/{id}',  [DateController::class, 'edit'])->name('editDate');
			Route::post('updateDate/{id}',  [DateController::class, 'update'])->name('updateDate');
		});
		//delete
		route::group(["middleware" => "role:6,'delete'"], function () {
			Route::get('deleteDate/{id}',  [DateController::class, 'delete'])->name('deleteDate');
		});

		//read
		route::group(["middleware" => "role:6,'read'"], function () {
			Route::get('showDates',  [DateController::class, 'show'])->name('showDates');
			Route::get('addDate',  [DateController::class, 'show'])->name('addDate');
		});


		/******************************************************/





		/******************************************************/

		//سندات القبض 
		//write
		route::group(["middleware" => "role:7,'write'"], function () {

			// سند قبض
			Route::get('Catch_Receipt',  [BondsController::class, 'Catch_Receipt'])->name('Catch_Receipt');
			//سند صرف 
			Route::get('receipt',  [BondsController::class, 'receipt'])->name('receipt');

			Route::post('bond/{type}',  [BondsController::class, 'bond'])->name('bond');
		});


		//read
		route::group(["middleware" => "role:7,'read'"], function () {

			// جدول سندات الصرف  
			Route::get('receipts_table',  [BondsController::class, 'receipts_table'])->name('receipts_table');

			// جدول سندات القبض  
			Route::get('Catch_Receipts_table',  [BondsController::class, 'Catch_Receipts_table'])->name('Catch_Receipts_table');
		});


		/******************************************************/




		route::get("/showImage/{id}", [UserController::class, 'getImage'])->name('showImage');



		// GET DATA
		//Dalals
		route::get("/getDalals/{id}", [UserController::class, 'getImage'])->name('showImage');
	});





	/******     Writer      *******/
	Route::middleware(['writer'])->group(function () {

		//Bill
		route::get("/addBill", [BillController::class, 'add'])->name('addBill');
		route::post("/storeBill", [BillController::class, 'store'])->name('storeBill');
		route::get("/editBill/{id}", [BillController::class, 'edit'])->name('editBill');
		route::post("/updateBill/{id}", [BillController::class, 'update'])->name('updateBill');
		route::get("/deleteBill/{id}", [BillController::class, 'delete'])->name('deleteBill');
		route::get("/showBills2", [BillController::class, 'show'])->name('showBills');
		route::get("/showBills_today", [BillController::class, 'show_today'])->name('showBills_today');
	});




	/******     Dealer      *******/
	Route::middleware(['dealer'])->group(function () {

		//Bills

		route::get("/get/Bills", [DealersBillController::class, 'index'])->name('getBills');



		//Bonds
		route::get("/get/Bonds", [DealersBondsController::class, 'index'])->name('getBonds');
		route::get("/get/Bonds/receipt", [DealersBondsController::class, 'getBonds1'])->name('getBondsReceipt');
		//.
		route::post("/get/Bonds/date/receipt", [DealersBondsController::class, 'getBondsDate'])->name('getBondsDate');

		route::post("/get/Bonds/date/paid", [DealersBondsController::class, 'getBondsDateReceipt'])->name('getBondsDateReceipt');
		//.
		//.


	});
	Route::middleware(['farmer'])->group(function () {

		//Bills

		route::get("/get/farmer/Bills", [FarmersBillController::class, 'index'])->name('getFarmerBills');



		//Bonds
		route::get("/get/farmer/Bonds", [FarmersBondsController::class, 'index'])->name('getFarmerBonds');
		route::get("/get/farmer/Bonds/receipt", [FarmersBondsController::class, 'getBonds1'])->name('getFarmerBondsReceipt');
		//.
		route::post("/get/farmer/Bonds/date/receipt", [FarmersBondsController::class, 'getBondsDate'])->name('getFarmerBondsDate');

		route::post("/get/farmer/Bonds/date/paid", [FarmersBondsController::class, 'getBondsDateReceipt'])->name('getFarmerBondsDateReceipt');
		//.
		//.


	});
});
