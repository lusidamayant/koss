<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            color: #333;
        }
        
        /* Hero Section */
        .hero-section {
            background-image: url('asset/logokosrempah.jpg');
            background-size: cover;
            background-position: center;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-section h2 {
            font-size: 3.5em;
            font-weight: bold;
            z-index: 1;
            position: relative;
        }

        /* Contact Info Section */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2em;
            color: #666;
        }

        .contact-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .contact-info div {
            flex: 1;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .contact-info div:hover {
            transform: translateY(-5px);
        }

        .contact-info div h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #e67300;
        }

        .contact-info div p {
            font-size: 1.2em;
            color: #333;
        }

        /* Contact Form and Map Side by Side */
        .contact-section {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        form {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form input, form textarea {
            padding: 15px;
            font-size: 1.1em;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        form input:focus, form textarea:focus {
            border-color: #e67300;
        }

        form input[type="submit"] {
            background-color: #e67300;
            color: white;
            cursor: pointer;
            border: none;
            padding: 15px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #cc6600;
        }

        /* Map Section */
        .map {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .map iframe {
            width: 100%;
            height: 550px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-info {
                flex-direction: column;
                gap: 20px;
            }

            .contact-section {
                flex-direction: column;
            }

            form {
                width: 100%;
            }

            .hero-section h2 {
                font-size: 2.5em;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('user.navigasi')

    <!-- Hero Section -->
    <section class="hero-section">
        <h2>CONTACT US</h2>
    </section>

    <!-- Contact Information Section -->
    <div class="container">
        <div class="header">
            <h1>Info Lebih Lanjut</h1>
            <p>Jangan ragu untuk menghubungi kami melalui informasi kontak di bawah ini:</p>
        </div>

        <div class="contact-info">
            <div>
                <h3>Kontak</h3>
                <p>0821-4337-2573</p>
            </div>
            <div>
                <h3>Email</h3>
                <p>kosrempah@gmail.com</p>
            </div>
            <div>
                <h3>Alamat</h3>
                <p>Kampus 2 ITN Malang, Jalan Simpang Golf No. A5, Tasikmadu, Karangploso, Kavling 14, Kabupaten Malang, Jawa Timur 65149</p>
            </div>
        </div>

        <!-- Contact Form and Map Section Side by Side -->
        <div class="contact-section">
            <!-- Contact Form -->
            <form action="#">
                <input type="text" name="name" placeholder="Your Name">
                <input type="email" name="email" placeholder="Email">
                <input type="tel" name="contact" placeholder="Contact No.">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" rows="5" placeholder="Message"></textarea>
                <input type="submit" value="Send Message">
            </form>

            <!-- Map Section -->
            <div class="map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63315.30348546242!2d112.5939243179747!3d-7.971543065481259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7896d5e0b2e453%3A0x6a3b02d1f925e2fa!2sAssalam%20Food!5e0!3m2!1sen!2sid!4v1697038206452!5m2!1sen!2sid" 
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>

    @include('user.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  
</body>
</html>
