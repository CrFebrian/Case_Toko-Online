<?php
use PHPUnit\Framework\TestCase;
use App\Checkout;

require_once __DIR__ . '/../src/Checkout.php';

class CheckoutTest extends TestCase
{
    // Menggunakan konsep Seed Data sesuai arahan LKM Tahap 2
    private $seedFile = __DIR__ . '/../data/products_seed.json';
    private $testFile = __DIR__ . '/../data/products_test.json';
    private $orderFile = __DIR__ . '/../data/orders_test.json';
    private $checkout;

    // CT Stage: Menyiapkan data segar SEBELUM tiap tes
    protected function setUp(): void
    {
        copy($this->seedFile, $this->testFile);
        file_put_contents($this->orderFile, json_encode([]));
        $this->checkout = new Checkout($this->testFile, $this->orderFile);
    }

    // ---------------------------------------------------------
    // TEST 1: CT Stage Integration Test (Dari Langkah 2.2)
    // ---------------------------------------------------------
    public function testCheckoutReducesStock()
    {
        $keranjang = ['PRD-002' => 1];
        $this->checkout->prosesCheckout('test@mail.com', 'Jl. Sudirman', $keranjang);

        $products = json_decode(file_get_contents($this->testFile), true);
        $this->assertEquals(4, $products['PRD-002']['stok']);
    }

    // ---------------------------------------------------------
    // TEST 2-4: Mempertahankan 100% Coverage
    // ---------------------------------------------------------
    public function testPath1TanpaDiskonKenaOngkir()
    {
        $keranjang = ['PRD-001' => 2]; 
        $nota = $this->checkout->prosesCheckout('test@mail.com', 'Alamat 1', $keranjang);
        $this->assertEquals(320000, $nota['total_bayar']);
    }

    public function testPath2GratisOngkirTanpaDiskon()
    {
        $keranjang = ['PRD-002' => 3]; 
        $nota = $this->checkout->prosesCheckout('test@mail.com', 'Alamat 2', $keranjang);
        $this->assertEquals(750000, $nota['total_bayar']);
    }

    public function testPath3GratisOngkirDanDiskon()
    {
        $keranjang = ['PRD-002' => 5]; 
        $nota = $this->checkout->prosesCheckout('test@mail.com', 'Alamat 3', $keranjang);
        $this->assertEquals(1125000, $nota['total_bayar']);
    }

    // CT Stage: Menghapus data sampah SETELAH tiap tes
    protected function tearDown(): void
    {
        if (file_exists($this->testFile)) unlink($this->testFile);
        if (file_exists($this->orderFile)) unlink($this->orderFile);
    }
}