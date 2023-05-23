INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Biscotto'),
(2, 'Torta'),
(3, 'Muffin'),
(4, 'Cupcake');

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'Lamponi'),
(2, 'Limone'),
(3, 'Burro d\'arachidi');


INSERT INTO `sweets` (`id`, `name`, `description`, `price`, `image`, `opt_image`, `category_id`) VALUES
(1, 'Cheesecake ai frutti di bosco', 'Cheesecake vegana ai frutti di bosco. \r\nUn ottimo dolce per le giornate autunnali, sopratutto se accompagnata con un buon thè.', 19.99, 'cheesecake_frutti_di_bosco.jpg', NULL, 2),
(2, 'Cheesecake al limone e pistacchio', 'Cheesecake vegana al limone con granella di pistacchi.\r\nUn ottimo dolce per chi adora i sapori agrumati ed i pistacchi.', 21.00, 'white_cheesecake_limone_pistacchio_1.jpg', 'cheesecake_limone_pistacchio_2.jpg', 2),
(3, 'Cupcake al burro d\'arachidi e lamponi', 'Un ottimo cupcake vegano al burro d\'arachidi e lamponi.\r\nUn\'esplosione di sapore da provare assolutamente.', 3.00, 'cupcake_burro_arachidi_lampone_1.jpg', 'cupcake_burro_arachidi_lampone_2.jpg', 4),
(4, 'Biscotto alla frutta secca', 'Un\'ottimo biscotto vegano per gli amanti dell\'autunno. \r\nOttimo se accompagnato ad una cioccolata calda, cosa aspetti a provarlo?', 0.99, 'biscotto_frutta_secca_1.jpg', 'biscotto_frutta_secca_2.jpg', 1);


INSERT INTO `sweet_ingredient` (`sweet_id`, `ingredient_id`) VALUES
(3, 3),
(1, 1),
(3, 1);


INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'fraGolino98', 'giacomogolino@gmail.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', NULL, '2023-05-23 11:07:40', '2023-05-23 11:07:40');