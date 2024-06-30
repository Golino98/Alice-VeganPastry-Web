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
(3, 'John Doe', 'John@doe.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2023-06-10 13:15:28', '2023-06-10 13:15:28'),
(4, 'PasticcereTest Admin', 'pasticcere@example.com', NULL, 'b40cdb9a915a9a68a5820ca6313dec9b', 1, NULL, '2024-06-10 13:15:28', '2024-06-10 13:15:28'),
(5, 'Cliente Goloso', 'clienteGoloso@example.com', NULL, '977fe4442317429b9d94e63c8ef86efb', 0, NULL, '2024-06-10 13:16:28', '2024-06-10 13:16:28'),
(6, 'Maria Rossi', 'maria.rossi@example.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2024-06-11 14:12:22', '2024-06-11 14:12:22'),
(7, 'Luca Verdi', 'luca.verdi@example.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2024-06-11 14:13:22', '2024-06-11 14:13:22'),
(8, 'Sara Neri', 'sara.neri@example.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2024-06-11 14:14:22', '2024-06-11 14:14:22'),
(9, 'Paola Bianchi', 'paola.bianchi@example.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2024-06-11 14:15:22', '2024-06-11 14:15:22'),
(10, 'Giorgio Gialli', 'giorgio.gialli@example.com', NULL, '6e6bc4e49dd477ebc98ef4046c067b5f', 0, NULL, '2024-06-11 14:16:22', '2024-06-11 14:16:22');


INSERT INTO `orders` (`id`, `user_id`, `payment_date`, `sweets_list`, `status`) VALUES
(2, 1, '2023-06-19 14:03:44', 'Cupcake alla fragola (x1)', '0'),
(3, 1, '2023-06-19 14:03:44', 'Cupcake alla fragola (x1)\r\nTorta alle mele (x7)', '1'),
(4, 1, '2023-06-19 15:35:02', 'Frutta fresca (x2)', '2'),
(5, 5, '2024-05-19 12:35:22', 'Frutta fresca (x2)', '0'),
(6, 5, '2024-05-22 11:03:44', 'Cupcake alla fragola (x2)\r\nTorta alle mele (x2)', '1'),
(7, 5, '2024-05-14 17:35:36', 'Torta alle mele (x3)', '0'),
(8, 5, '2024-06-02 21:18:45', 'Torta alle mele (x1)', '0'),
(9, 6, '2024-06-12 10:15:30', 'Cupcake alla fragola (x1)\r\nTorta alle mele (x1)', '0'),
(10, 6, '2024-06-13 11:25:30', 'Frutta fresca (x2)', '1'),
(11, 7, '2024-06-14 12:35:30', 'Cupcake alla fragola (x2)\r\nTorta alle mele (x1)', '2'),
(12, 8, '2024-06-15 13:45:30', 'Frutta fresca (x1)\r\nTorta alle mele (x1)', '0'),
(13, 9, '2024-06-16 14:55:30', 'Torta alle mele (x1)\r\nCupcake alla fragola (x2)', '1'),
(14, 10, '2024-06-17 15:05:30', 'Frutta fresca (x1)\r\nTorta alle mele (x1)', '2'),
(15, 10, '2024-06-18 16:15:30', 'Cupcake alla fragola (x1)\r\nFrutta fresca (x1)', '0'),
(16, 6, '2024-06-19 10:30:50', 'Cupcake alla fragola (x2)\r\nFrutta fresca (x1)', '0'),
(17, 6, '2024-06-20 11:45:30', 'Torta alle mele (x2)', '1'),
(18, 7, '2024-06-21 12:50:10', 'Frutta fresca (x3)', '2'),
(19, 7, '2024-06-22 14:05:00', 'Cupcake alla fragola (x1)\r\nTorta alle mele (x2)', '0'),
(20, 8, '2024-06-22 15:15:40', 'Torta alle mele (x1)\r\nFrutta fresca (x2)', '1'),
(21, 8, '2024-06-24 16:25:20', 'Cupcake alla fragola (x3)', '2'),
(22, 9, '2024-06-25 17:35:10', 'Frutta fresca (x1)\r\nTorta alle mele (x1)', '0'),
(23, 9, '2024-06-26 18:45:50', 'Cupcake alla fragola (x2)', '1'),
(24, 10, '2024-06-27 19:55:30', 'Torta alle mele (x3)', '2'),
(25, 10, '2024-06-27 21:05:10', 'Frutta fresca (x2)\r\nCupcake alla fragola (x1)', '0');