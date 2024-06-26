<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $products = [
            1 => [
                "name" => "Security Pro Camera",
                "price" => 149.99,
                "description" => "High-resolution indoor/outdoor security camera with night vision."
            ],
            2 => [
                "name" => "SafeHome Alarm System",
                "price" => 199.99,
                "description" => "Wireless home alarm system with mobile alerts."
            ],
            3 => [
                "name" => "Guardian Smoke Detector",
                "price" => 29.99,
                "description" => "Smart smoke and carbon monoxide detector with real-time notifications."
            ],
            4 => [
                "name" => "Vision Doorbell",
                "price" => 99.99,
                "description" => "Video doorbell with 1080p HD video and two-way audio."
            ],
            5 => [
                "name" => "Intruder Alert Sensor",
                "price" => 49.99,
                "description" => "Motion sensor with pet-friendly settings and mobile integration."
            ],
            6 => [
                "name" => "Window Shield",
                "price" => 39.99,
                "description" => "Break-in resistant window film with UV protection."
            ],
            7 => [
                "name" => "Digital Safe",
                "price" => 89.99,
                "description" => "Electronic safe with keypad entry and emergency override key."
            ],
            8 => [
                "name" => "Floodlight Cam",
                "price" => 129.99,
                "description" => "Outdoor security camera with built-in floodlights and siren."
            ],
            9 => [
                "name" => "Smart Lock",
                "price" => 109.99,
                "description" => "Keyless entry lock with remote access and activity log."
            ],
            10 => [
                "name" => "Driveway Monitor",
                "price" => 59.99,
                "description" => "Wireless driveway alarm with adjustable range and sensitivity."
            ],
            11 => [
                "name" => "Panic Button",
                "price" => 19.99,
                "description" => "Emergency panic button with silent alarm feature."
            ],
            12 => [
                "name" => "Glass Break Sensor",
                "price" => 34.99,
                "description" => "Acoustic glass break sensor with instant mobile alerts."
            ],
            13 => [
                "name" => "Gatekeeper System",
                "price" => 249.99,
                "description" => "Automated gate control system with remote operation."
            ],
            14 => [
                "name" => "Night Watch Floodlight",
                "price" => 79.99,
                "description" => "Motion-activated LED floodlight with energy-saving features."
            ],
            15 => [
                "name" => "Perimeter Defense Kit",
                "price" => 299.99,
                "description" => "Complete outdoor security system with cameras, lights, and sensors."
            ],
            16 => [
                "name" => "Surveillance Drone",
                "price" => 499.99,
                "description" => "Autonomous surveillance drone with live video feed and GPS tracking."
            ],
            17 => [
                "name" => "Biometric Door Handle",
                "price" => 139.99,
                "description" => "Fingerprint-activated door handle for secure access."
            ],
            18 => [
                "name" => "Solar-Powered Camera",
                "price" => 159.99,
                "description" => "Eco-friendly security camera with solar panel and battery backup."
            ],
            19 => [
                "name" => "Remote Control Siren",
                "price" => 59.99,
                "description" => "Loud siren with remote activation for deterrence and alerts."
            ],
            20 => [
                "name" => "Wireless Intercom System",
                "price" => 199.99,
                "description" => "Full-duplex intercom system with secure digital communication."
            ],
            21 => [
                "name" => "Outdoor Motion Lights",
                "price" => 69.99,
                "description" => "Weatherproof motion-activated lights for enhanced security."
            ],
            22 => [
                "name" => "Portable Alarm Kit",
                "price" => 79.99,
                "description" => "Compact and portable alarm system for travel and temporary installations."
            ],
            23 => [
                "name" => "Key Tracker",
                "price" => 14.99,
                "description" => "Bluetooth key finder with crowd-sourced location tracking."
            ],
            24 => [
                "name" => "Child Safety Monitor",
                "price" => 49.99,
                "description" => "Wearable child monitor with GPS tracking and safe zone alerts."
            ],
            25 => [
                "name" => "Pet Surveillance Camera",
                "price" => 99.99,
                "description" => "Interactive pet camera with treat dispenser and two-way audio."
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
