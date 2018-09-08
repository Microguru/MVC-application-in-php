<?php
error_reporting(20);

Route::set('index',function()
{
    index::CreateView(index);
    index::test();

});
Route::set('about-us',function()
{
    aboutUs::CreateView(aboutUs);
});

Route::set('contact-us',function()
{
    contactUs::CreateView(contactUs);
});

Route::set('create_book',function()
{
    createBook::CreateView(createbook);
    createBook::insert();
});

Route::set('read_one',function()
{
    readOne::CreateView(readOne);
    readOne::read();
});

Route::set('update_book',function()
{
    updateBook::CreateView(updatebook);
    updateBook::update();
});
Route::set('delete_book',function()
{
    deleteBook::CreateView(deletebook);
    deleteBook::delete();
});