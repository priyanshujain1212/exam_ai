<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for ('dashboard', function ($trail) {
    $trail->push(trans('validation.attributes.dashboard'), route('admin.dashboard.index'));
});

Breadcrumbs::for ('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.profile'));
});

// Dashboard / Setting
Breadcrumbs::for ('setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.settings'));
});

// Dashboard / Email Setting
Breadcrumbs::for ('sms-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.sms_settings'));
});

// Dashboard / Email Setting
Breadcrumbs::for ('emailsetting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.emailsettings'));
});

// Dashboard / SMS Setting
Breadcrumbs::for ('smssetting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.smssetting'));
});

// Dashboard / SMS Setting
Breadcrumbs::for ('notificationsetting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.notificationsetting'));
});

// Dashboard / Payment Setting
Breadcrumbs::for ('payment-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.payment_settings'));
});


// Dashboard / User
Breadcrumbs::for ('students', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.students'), route('admin.students.index'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('students/add', function ($trail) {
    $trail->parent('students');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('students/edit', function ($trail) {
    $trail->parent('students');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('students/view', function ($trail) {
    $trail->parent('students');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / User
Breadcrumbs::for ('administrators', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.administrators'), route('admin.administrators.index'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('administrators/add', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('administrators/edit', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('administrators/view', function ($trail) {
    $trail->parent('administrators');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / User
Breadcrumbs::for ('customers', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.customers'), route('admin.customers.index'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('customers/edit', function ($trail) {
    $trail->parent('customers');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('customers/view', function ($trail) {
    $trail->parent('customers');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / User





Breadcrumbs::for ('organisations', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.organisations'), route('admin.organisations.index'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('organisations/edit', function ($trail) {
    $trail->parent('organisations');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('organisations/view', function ($trail) {
    $trail->parent('organisations');
    $trail->push(trans('validation.attributes.view'));
});
Breadcrumbs::for ('organisations/add', function ($trail) {
    $trail->parent('organisations');
    $trail->push(trans('validation.attributes.add'));
});





Breadcrumbs::for ('exams', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.exams'), route('admin.exams.index'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('exams/edit', function ($trail) {
    $trail->parent('exams');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Shop / Edit
Breadcrumbs::for ('exams/view', function ($trail) {
    $trail->parent('exams');
    $trail->push(trans('validation.attributes.view'));
});
Breadcrumbs::for ('exams/add', function ($trail) {
    $trail->parent('exams');
    $trail->push(trans('validation.attributes.add'));
});




// Dashboard / Role
Breadcrumbs::for ('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.roles'), route('admin.role.index'));
});

// Dashboard / Role / Add
Breadcrumbs::for ('role/add', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Role / Edit
Breadcrumbs::for ('role/edit', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.edit'));
});

// Dashboard / Role / View
Breadcrumbs::for ('role/view', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('validation.attributes.view'));
});

// Dashboard / Banners
Breadcrumbs::for ('banners', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.banners'), route('admin.banner.index'));
});

// Dashboard / Banner / Add
Breadcrumbs::for ('banners/add', function ($trail) {
    $trail->parent('banners');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Banner / Edit
Breadcrumbs::for ('banners/edit', function ($trail) {
    $trail->parent('banners');
    $trail->push(trans('validation.attributes.edit'));
});


// Dashboard / Page
Breadcrumbs::for ('pages', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.pages'), route('admin.page.index'));
});

// Dashboard / Page / Add
Breadcrumbs::for ('pages/add', function ($trail) {
    $trail->parent('pages');
    $trail->push(trans('validation.attributes.add'));
});

// Dashboard / Page / Edit
Breadcrumbs::for ('pages/edit', function ($trail) {
    $trail->parent('pages');
    $trail->push(trans('validation.attributes.edit'));
});
// Setting Module
Breadcrumbs::for ('site-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.site_settings'));
});

// Setting Module
Breadcrumbs::for ('email-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.email_settings'));
});

// Setting Module
Breadcrumbs::for ('notification-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.notification_settings'));
});

// Setting Module
Breadcrumbs::for ('social-login-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.social_login_settings'));
});

// Setting Module
Breadcrumbs::for ('otp-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.otp_settings'));
});

// Setting Module
Breadcrumbs::for ('homepage-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.homepage_settings'));
});

// Setting Module
Breadcrumbs::for ('social-setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.social_settings'));
});


Breadcrumbs::for ('ratings', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('validation.attributes.ratings'));
});
