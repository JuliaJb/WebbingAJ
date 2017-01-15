<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Login#login', 'login'],
		['GET|POST', '/home', 'Default#home', 'home'],
		['GET|POST', '/profil', 'Login#profil', 'profil'],
		['GET|POST', '/mon_profil', 'Login#mon_profil', 'mon_profil'],
		['GET|POST', '/photo', 'Photo#photo', 'photo'],
		['GET', '/deconnexion', 'Default#deconnexion', 'deconnexion'],
		['GET', '/info_maurice', 'Default#info_maurice', 'info_maurice'],
		['GET', '/info_france', 'Default#info_france', 'info_france'],
		
		//Forum
		['GET|POST', '/forum/create', 'Forum#post_create', 'forum_create'],
		['GET', '/forum/admin', 'Forum#post_list', 'forum'],
		['GET', '/forum/[a:cat]', 'Forum#post_filter', 'filter'],
		['GET|POST', '/forum/detail/[:id]', 'Forum#post_detail', 'forum_detail'],
		['GET|POST', '/forum/update/[:id]', 'Forum#post_update', 'forum_update'],
		['GET|POST', '/forum/delete/[:id]', 'Forum#post_delete', 'forum_delete'],
		['GET|POST', '/forum/search', 'Forum#search', 'search'],



		// Admin
		['GET|POST', '/admin', 'Admin#admin', 'admin'],
		['GET|POST', '/admin/profil_invites', 'Admin#profil_invites', 'profil_invites'],
		['GET|POST', '/admin/ajouter_invite', 'Admin#ajouter_invite', 'ajouter_invite'],
		['GET|POST', '/admin/attribuer_roles', 'Admin#attribuer_roles', 'attribuer_roles'],


		// plan de table
		['GET|POST', '/plan', 'Plan#plan', 'plan'],

		// Test
		['GET|POST', '/test', 'Test#test', 'test'],

	);