## Aplikasi Pantau Korupsi Web

Aplikasi Pantau Korupsi adalah sebuah aplikasi berbasis web yang menampilkan graphic visualisasi data kasus korupsi yang ada di indonesia selama periode 2016-2020

## Spesifikasi Aplikasi
- Menggunakan Bahasa Pemrograman PHP
- Menggunakan Laravel Framework
- Menggunakan MongoDb sebagai Database
- Menggunakan ChartJS untuk visualisasi dATA

## Cara Menjalankan Aplikasi

*Pastikan anda telah menginstall composer dan docker sebelumnya

- download depedencise
`
composer install --ignore-platform-reqs --no-interaction
`
- jalankan aplikasi dengan docker-composer
`
docker-composer up --build
`
- buka browser dan akses IP <a href="htpp://localhost:8282">htpp://localhost:8282</a>

## Author
@hamdan

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
