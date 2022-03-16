<?php 
// pertemuan 2 - PHP Dasar
// sintaks PHP

// Standar Output
// echo, print
// print_r
// var_dump

// penulisan sintaks PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// variabel dan Tipe Data
// variabel
// tidak boleh diawali dengan angka, tapi boleh mengandung angka
// $nama = "adawiyahajr";
// echo "Halo, nama saya $nama";

// operator
// aritmatika
// + - * / %
// $x = 10;
// $y = 20;
// echo $x * $y;

// penggabung string / concatenation / concat
// .
// $nama_depan = "adawiyah";
// $nama_belakang = "ajriah";
// echo $nama_depan . " " . $nama_belakang;

// Assignment
// =, +=, -=, *=, /=, %=, .=
// $x = 1;
// $x -= 5;
// echo $x;
// $nama = "adawiyah";
// $nama .= " ";
// $nama .= "ajriah";
// echo $nama;

// perbandingan
// <, >, <=, >=, ==, !=
// var_dump(1 == "1");

// identitas
// ===, !==
// var_dump(1 === "1");

// logika
// &&, ||, !
$x = 30;
var_dump($x < 20 || $x % 2 == 0);
?>