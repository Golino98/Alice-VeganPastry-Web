INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Biscotto'),
(2, 'Torta'),
(3, 'Muffin'),
(4, 'Cupcake');

INSERT INTO `sweets` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
(1, 'Cheesecake ai frutti di bosco', 'Cheesecake vegana ai frutti di bosco. \r\nUn ottimo dolce per le giornate autunnali, sopratutto se accompagnata con un buon thè.', 19.99, 'cheesecake_frutti_di_bosco.jpg', 2),
(2, 'Cheesecake al limone e pistacchio', 'Cheesecake vegana al limone con granella di pistacchi.\r\nUn ottimo dolce per chi adora i sapori agrumati ed i pistacchi.', 21.00, 'cheesecake_limone_pistacchio.jpg', 2),
(3, 'Cupcake al burro d\'arachidi e lamponi', 'Un ottimo cupcake vegano al burro d\'arachidi e lamponi.\r\nUn\'esplosione di sapore da provare assolutamente.', 3.00, 'cupcake_burro_arachidi_lampone.jpg', 4),
(4, 'Biscotto alla frutta secca', 'Un\'ottimo biscotto vegano per gli amanti dell\'autunno. \r\nOttimo se accompagnato ad una cioccolata calda, cosa aspetti a provarlo?', 0.99, 'biscotto_frutta_secca.jpg', 1);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'fraGolino', 'giacomogolino@gmail.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2023-06-10 12:37:57', '2023-06-10 12:37:57'),
(2, 'Alice', 'alice@gmail.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 1, NULL, '2023-06-10 13:12:22', '2023-06-10 13:12:22'),
(3, 'John Doe', 'John@doe.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2023-06-10 13:15:28', '2023-06-10 13:15:28');

INSERT INTO `orders` (`id`, `user_id`, `payment_date`, `sweets_list`, `status`) VALUES
(2, 1, '2023-06-19 14:03:44', 'Cupcake alla fragola (x1)', '0'),
(3, 1, '2023-06-19 14:03:44', 'Cupcake alla fragola (x1)\r\nTorta alle mele (x7)', '1'),
(4, 1, '2023-06-19 15:35:02', 'Frutta fresca(x2)', '2');
