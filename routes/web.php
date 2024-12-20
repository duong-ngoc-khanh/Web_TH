<?php
use App\Http\Controllers\IssueController;

Route::get('/', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
// Đường dẫn để hiển thị chi tiết một đồ án cụ thể (tuỳ chọn)
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
