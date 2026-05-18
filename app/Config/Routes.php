<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/following', 'Home::following');
$routes->get('/community', 'Home::following');
$routes->get('/search', 'Home::search');
$routes->get('/pick/location-filter', 'Home::locationPicker');
$routes->get('/chat', 'Home::chat');
$routes->get('/messages', 'Home::chat');
$routes->get('/notifications', 'Home::notifications');
$routes->get('/profile', 'Home::profile');
$routes->get('/settings', 'Home::settings');
$routes->get('/add-activity', 'Home::addActivity');
$routes->post('/activities', 'Home::storeActivity');
$routes->get('/activity/(:num)', 'Home::activityDetail/$1');
$routes->get('/activity/(:num)/registration', 'Home::registration/$1');
$routes->post('/activity/(:num)/join', 'Home::joinActivity/$1');
$routes->get('/activities/settings/date', 'Home::activityDateSettings');
$routes->get('/activities/settings/form', 'Home::activityFormSettings');
$routes->get('/activities/settings/advanced', 'Home::activityAdvancedSettings');
$routes->get('/seating', 'Home::seating');
$routes->post('/auth/login', 'Home::login');
