How To Install this Project

1. Persiapan
	- Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau Git Bash (selanjutnya kita sebut terminal).
	- Memiliki Web Server (misal XAMPP) dengan PHP Minimal 5.6 PHP maximal versi 7.2.24 Karena project ini menggunakan framework codeigniter versi 3.1.10
	- Memiliki koneksi internet (untuk proses installasi).

2. Langkah-Langkah
	- git clone https://github.com/mohrahmatullah/erp-stock.git Melalui terminal
	- buat database
		contoh database = stock-erp
	- Untuk databasenya silahkan setting pada file config->database.php

			$db['default'] = array(
				'dsn'	=> '',
				'hostname' => 'db',
				'username' => 'root',
				'password' => 'example',
				'database' => 'stock-erp',
				'dbdriver' => 'mysqli',
				'dbprefix' => '',
				'pconnect' => FALSE,
				'db_debug' => (ENVIRONMENT !== 'production'),
				'cache_on' => FALSE,
				'cachedir' => '',
				'char_set' => 'utf8',
				'dbcollat' => 'utf8_general_ci',
				'swap_pre' => '',
				'encrypt' => FALSE,
				'compress' => FALSE,
				'stricton' => FALSE,
				'failover' => array(),
				'save_queries' => TRUE
			);

		untuk hostname, username, password, database
		silahkan sesuaikan
	
	- Selesai

Modul yang tersedia :
1. Menu Item Stock, untuk lihat current stock di tiap cc
2. Menu Item Detail diakses dari Button Detail di menu item stock, melihat pergerakan stok barang yang dipilih
3. Modul Add Mutation, form untuk perpindahan stok item dari cc source ke cc destination

Terimakasih atas kesempatannya untuk mengikuti test skill pada passion jewelry