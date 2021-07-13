<?php
use App\Http\Controllers\ticketController;
//Route::view('/ticket','Ticket.form')->name('Ticket.form');
Route::any('/ticket', [ticketController::class, 'create'])->name('Ticket.form');
Route::any('/ticket/store', [ticketController::class, 'store'])->name('Ticket.receiveForm');