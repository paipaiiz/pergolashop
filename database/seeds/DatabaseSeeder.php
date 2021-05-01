<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'แอดมิน',
            'email' => 'admin@treeshop.com',
            'password' => '$2y$10$Z6torlPVv9rYNgFfdfJT0.2dQ4O7axC4WWshKncmxG1cE7dTXmbA2',
            'status' => 'admin',
        ]);
        User::create([
            'name' => 'นายพิพัฒน์พงษ์ อินทรพาณิชย์',
            'email' => 'user@treeshop.com',
            'password' => '$2y$10$Z6torlPVv9rYNgFfdfJT0.2dQ4O7axC4WWshKncmxG1cE7dTXmbA2',
            'status' => 'user',
        ]);
        Product::create([
            'product_name' => 'ต้นกระบองเพชร',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '250',
            'product_detail' => 'นิยมปลูกในบ้านหรือคอนโดมากท่สี ุดก็ว่าได้ เพราะทงั้ ดูแลง่าย ใช้พ้นื ที่ไม่เยอะ (ต่อหนึ่งต้น)',
            'product_amount' => '1',
            'product_image' => 'images/001.png',
            'product_ar_id' => '91087aaf-175c-40fa-b8cb-d7e13f862b34',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นกระบองเพชร',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '300',
            'product_detail' => 'นิยมปลูกในบ้านหรือคอนโดมากท่สี ุดก็ว่าได้ เพราะทงั้ ดูแลง่าย ใช้พ้นื ที่ไม่เยอะ (ต่อหนึ่งต้น)',
            'product_amount' => '1',
            'product_image' => 'images/001.png',
            'product_ar_id' => '91087aaf-175c-40fa-b8cb-d7e13f862b34',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นกระบองเพชร',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '400',
            'product_detail' => 'นิยมปลูกในบ้านหรือคอนโดมากท่สี ุดก็ว่าได้ เพราะทงั้ ดูแลง่าย ใช้พ้นื ที่ไม่เยอะ (ต่อหนึ่งต้น)',
            'product_amount' => '1',
            'product_image' => 'images/001.png',
            'product_ar_id' => '91087aaf-175c-40fa-b8cb-d7e13f862b34',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นครีบปลาวาฬ',
            'product_type' => 'ต้นไม้ที่ชอบแสงแดด',
            'product_price' => '140',
            'product_detail' => 'ไม่ชอบน้ำ แต่ชอบแสงแดด หากจะนำไปวางไว้ในห้องก็ควรอยู่ในที่ที่มีแดดส่องถึงได้ตลอดวัน',
            'product_amount' => '1',
            'product_image' => 'images/002.png',
            'product_ar_id' => 'f417327c-d232-4196-b442-866fc8012be4',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นครีบปลาวาฬ',
            'product_type' => 'ต้นไม้ที่ชอบแสงแดด',
            'product_price' => '150',
            'product_detail' => 'ไม่ชอบน้ำ แต่ชอบแสงแดด หากจะนำไปวางไว้ในห้องก็ควรอยู่ในที่ที่มีแดดส่องถึงได้ตลอดวัน',
            'product_amount' => '1',
            'product_image' => 'images/002.png',
            'product_ar_id' => 'f417327c-d232-4196-b442-866fc8012be4',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นครีบปลาวาฬ',
            'product_type' => 'ต้นไม้ที่ชอบแสงแดด',
            'product_price' => '110',
            'product_detail' => 'ไม่ชอบน้ำ แต่ชอบแสงแดด หากจะนำไปวางไว้ในห้องก็ควรอยู่ในที่ที่มีแดดส่องถึงได้ตลอดวัน',
            'product_amount' => '1',
            'product_image' => 'images/002.png',
            'product_ar_id' => 'f417327c-d232-4196-b442-866fc8012be4',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นตีนตุ๊กแกฝรั่ง',
            'product_type' => 'ต้นไม้ที่ชอบแสงแดด',
            'product_price' => '280',
            'product_detail' => 'จะชอบแสงแดดมาก ๆ แต่หากไม่ได้รับแสงแดดในบริเวณที่มาก ก็จะสามารถอยู่ได้ในแสงที่ร่ำไรได้ ถือว่าค่อนข้างเลี้ยงง่าย เจริญได้ดีในดินทราย และดินร่วนซุย',
            'product_amount' => '1',
            'product_image' => 'images/003.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นเสน่ห์จันทร์แดง',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '200',
            'product_detail' => 'เติบโตได้ดีในที่แสงรำไร อาจเป็นในอาคารหรือใต้ร่มไม้อื่น ไม่ชอบกลางแจ้งที่มีสภาพแดดหรืออากาศร้อน เพราะมักเหี่ยวตายง่าย',
            'product_amount' => '1',
            'product_image' => 'images/004.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นเสน่ห์จันทร์แดง',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '180',
            'product_detail' => 'เติบโตได้ดีในที่แสงรำไร อาจเป็นในอาคารหรือใต้ร่มไม้อื่น ไม่ชอบกลางแจ้งที่มีสภาพแดดหรืออากาศร้อน เพราะมักเหี่ยวตายง่าย',
            'product_amount' => '1',
            'product_image' => 'images/004.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นเสน่ห์จันทร์แดง',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '340',
            'product_detail' => 'เติบโตได้ดีในที่แสงรำไร อาจเป็นในอาคารหรือใต้ร่มไม้อื่น ไม่ชอบกลางแจ้งที่มีสภาพแดดหรืออากาศร้อน เพราะมักเหี่ยวตายง่าย',
            'product_amount' => '1',
            'product_image' => 'images/004.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นไทรใบสัก',
            'product_type' => 'ต้นไม้ที่ต้องดูแลเป็นพิเศษ',
            'product_price' => '180',
            'product_detail' => '1.ไทรใบสักที่จะเติบโตได้อย่างสมบูรณ์มักจะเป็นต้นที่ปลูกแบบเพาะเมล็ด ซึ่งต้องใช้เวลานานนานกว่า ไทรใบสักที่ขายส่วนใหญ่จึงมักจะเป็นแบบปักชำ ซึ่งตัวต้นไม้จะอ่อนแอ ปลูกให้รอดได้ยาก
                2.หากห้องหรือพื้
                นที่ที่จะเลี้ยงไทรใบสัก มีแสงไม่มากพอที่จะสามารถทำให้เรายืนแล้วมีเงาได้ หรือเป็นห้องที่แม้ตอนกลางวันก็ยังต้องเปิดไฟ ขอให้หาที่ใหม่
                3.สำหรับการรดน้ำ สามารถรด 1ครั้ง จนมั่นใจว่าน้ำซึมถึงก้นกระถาง และปล่อยไปได้เลยสัก 3-4 วัน',
            'product_amount' => '1',
            'product_image' => 'images/005.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นปาล์มไผ่',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '80',
            'product_detail' => 'พืชชนิดนี้เลี้ยงง่าย ทนทาน ไม่ต้องการแสงแดดมาก ทนต่อแมลง เลี้ยงในที่ร่มได้ เหมาะกับปลูกในบ้านและในอาคาร',
            'product_amount' => '1',
            'product_image' => 'images/006.png',
            'product_ar_id' =>  '981144d8-995c-4178-ab42-7f7784b3ff8c',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นมรกตแดง',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '280',
            'product_detail' => 'ควรปลูกไว้ใต้ร่มหรือร่มรำไร และรดน้ำให้ดินมีความชุ่มชื้นอยู่เสมอ แต่อย่าให้แฉะ หมั่นเช็ดใบด้วยผ้าชุบน้ำพอหมาด จะทำให้ใบมีสีเขียวเป็นมันดูสวยงาม ใช้ปุ๋ยคอกหรือปุ๋ยหมักละลายในน้ำรดเดือนละครั้ง',
            'product_amount' => '1',
            'product_image' => 'images/007.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นมอนสเตอร่า',
            'product_type' => 'ต้นไม้ที่ต้องดูแลเป็นพิเศษ',
            'product_price' => '420',
            'product_detail' => 'เคล็ดลับในการเลี้ยงดูต้นมอนสเตอร่าให้ใบสวยงามตลอดนั้นก็คือ ให้เอาน้ำมันพืชมาชุบผ้าหมาดๆ เช็ดถูไปที่ใบมอนสเตอร่าของคุณ จะทำให้ใบของมอนสเตอร่ามีความเขียวสดใส เงางาม เพียงเท่านี้เวลาที่คุณจะถ่ายรูปลงโซเชียลกับต้นไม้ของคุณ รูปที่ออกมาก็จะดูสดใสขึ้นมาอีกเป็นกอง',
            'product_amount' => '1',
            'product_image' => 'images/008.png',
            'product_ar_id' => '61789d78-1354-488b-999c-ed6457010553',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นยางอินเดียดำ',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '280',
            'product_detail' => 'ต้นยางอินเดียดูแลรักษาง่ายมาก จริง ๆ แทบไม่ต้องดูแลอะไรมากมาย เพราะเป็นต้นไม้ที่อดทนอยู่แล้ว แต่ถ้าจะปลูกให้สวยเลย ก็มีปัจจัยหลักๆ อยู่ 3 อย่างครับ
                1.แสงแดด ต้นยางอินเดียเป็นไม้ที่ชอบแดด ถ้าปลูกไว้นอกบ้านก็ให้โดนแสงแดดจัดๆ ได้ แต่ถ้าปลูกในบ้านหรือตัวอาคารควรปลูกให้โดดแสงแดดรำไร 3-5 ชั่วโมง
                2.ดิน ควรใช้วัสดุปลูกที่โปร่ง อาจผสมทรายเล็กน้อยให้ไหลผ่านสะดวก
                3.การรดน้ำ เวลารดน้ำให้รดน้ำจนแฉะ แล้วรอจนกว่าดินจะแห้งถึงค่อยรดน้ำอีกครั้ง',
            'product_amount' => '1',
            'product_image' => 'images/009.png',
            'product_ar_id' => '456639bc-3dfe-4c28-a36e-e8079d6911b1',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นว่านงาช้าง',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '480',
            'product_detail' => 'ดูแลง่ายมาก ๆ เนื่องจากเป็นต้นไม้ตระกูลเดียวกับลิ้นมังกร จึงไม่ต้องรดน้ำบ่อย ๆ สามารถอยู่ในที่แสงรำไรได้ อีกทั้งไม่ต้องใช้พื้นที่เยอะด้วย',
            'product_amount' => '1',
            'product_image' => 'images/010.png',
            'product_ar_id' => '2e2ec8ad-fd91-41b8-9f06-d821fde25110',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นหนวดปลาหมึก',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '150',
            'product_detail' => 'ต้องการแสงสว่างในการเจริญเติบโตแต่ไม่ชอบแสงแดดโดยตรง ควรให้น้ำแต่น้อย แต่ให้บ่อย ๆ ครั้งโดยจับดินในกระถางดู ถ้าแห้งควรให้น้ำ',
            'product_amount' => '1',
            'product_image' => 'images/011.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นเงินไหลมา',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '480',
            'product_detail' => 'แสงแดดรำไร หรือในร่ม รดน้ำปริมาณน้ำปานกลาง ควรให้น้ำ 5-7 วัน/ครั้ง ปลูกในดินร่วนซุย และใส่ปุ๋ยคอกหรือปุ๋ยหมัก อัตรา 300-500 กรัม/ต้น ใส่ 1-2 เดือน / ครั้ง',
            'product_amount' => '1',
            'product_image' => 'images/012.png',
            'product_ar_id' => 'f3567c2a-b1a2-4151-a6c0-df97cb092205',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นเศรษฐีเรือนใน',
            'product_type' => 'ต้นไม้ที่ไม่ชอบแสงแดด',
            'product_price' => '180',
            'product_detail' => 'สามารถปลูกได้ในที่ร่ม แต่ต้องมีแดดส่องถึง ควรปลูกในกระถางที่มีรูระบายน้ำได้ดี ชอบน้ำน้อย ๆ',
            'product_amount' => '1',
            'product_image' => 'images/013.png',
            'product_ar_id' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นลิ้นมังกร',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '290',
            'product_detail' => 'เติบโตได้เกือบทุกสภาพแวดล้อม แข็งแรง และต้องการแสดงแดดเพียงครึ่งวันเท่านั้น แถมไม่ต้องใช้พื้นที่เยอะด้วย นิยมปลูกตั้งแต่ต้นขนาดแคระ ไปจนถึงใบสูงยาวหลายฟุต',
            'product_amount' => '1',
            'product_image' => 'images/014.png',
            'product_ar_id' => null,
            'product_360_link' => null,
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นแคสตัส',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '50',
            'product_detail' => 'ปลูกเพื่อความสวยงาม',
            'product_amount' => '1',
            'product_image' => 'images/015.png',
            'product_ar_id' => null,
            'product_360_link' => 'https://nongtonmai.sirv.com/Spins/Cactus/Cactus.spin',
            'status' => 'normal'
        ]);
        Product::create([
            'product_name' => 'ต้นกุหลาบหิน',
            'product_type' => 'ต้นไม้ที่ดูแลง่าย',
            'product_price' => '35',
            'product_detail' => 'ปลูกเพื่อความสวยงาม',
            'product_amount' => '1',
            'product_image' => 'images/016.png',
            'product_ar_id' => '8c0deb27-651d-414a-a169-925c31c0ceba',
            'product_360_link' => 'https://nongtonmai.sirv.com/Spins/Kalanchoe/Kalanchoe.spin',
            'status' => 'normal'
        ]);
    }
}
