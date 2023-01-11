<?php
// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// // Home > User
Breadcrumbs::for('userslist', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('User List', route('userslist'));
});

Breadcrumbs::for('edituser', function ($trail) {
    $trail->parent('userslist');
    $trail->push('Edituser', route('edituser.id'));
});



// // Home > Product
Breadcrumbs::for('producttable', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Product Table', route('producttable'));
});

Breadcrumbs::for('addproduct', function ($trail) {
    $trail->parent('producttable');
    $trail->push('Add Product', route('addproduct'));
});


Breadcrumbs::for('editproduct', function ($trail) {
    $trail->parent('producttable');
    $trail->push('Editproduct', route('editproduct'));
});

// // Home > Order
Breadcrumbs::for('orderslist', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Orders List', route('orderslist'));
});

?>