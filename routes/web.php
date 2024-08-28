<?php
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CitasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// routes/web.php
Route::get('citas', 'CitaController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');

Route::resource('citas', App\Http\Controllers\CitaController::class);
Route::resource('categorias-servicios', App\Http\Controllers\CategoriasServicioController::class);
Route::resource('historiales', App\Http\Controllers\HistorialeController::class);
Route::resource('pacientes', App\Http\Controllers\PacienteController::class);
Route::resource('servicios', App\Http\Controllers\ServicioController::class);
Route::resource('tratamientos', App\Http\Controllers\TratamientoController::class);

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/create', [CalendarController::class, 'create'])->name('calendar.create');
Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
Route::get('/calendar/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');
Route::put('/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('/calendar/delete/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
