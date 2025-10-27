<section id="contact">
    <div class="contact-container">
        <h2>📩 Hubungi Kami</h2>
        <p>Kami senang mendengar pertanyaan, masukan, atau kerja sama dari kamu.</p>

        <div class="contact-info">
            <div class="info-box">
                📍 <strong>Alamat:</strong> Jl. Maja, Majalengka
            </div>
            <div class="info-box">
                📞 <strong>Telepon:</strong> +62 8966 0741 205
            </div>
            <div class="info-box">
                ✉️ <strong>Email:</strong> nekostore@fashionista.com
            </div>
        </div>

        <form class="contact-form" action="send_message.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="pesan" rows="5" placeholder="Tulis pesanmu..." required></textarea>
            <button type="submit">Kirim Pesan</button>
        </form>
    </div>
</section>

<style>
    #contact {
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        padding: 60px 20px;
        text-align: center;
    }

    .contact-container {
        max-width: 800px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    #contact h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        background: linear-gradient(90deg, #ff6f91, #ff9671, #ffc75f);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .contact-info {
        margin: 20px 0;
        text-align: left;
    }

    .info-box {
        font-size: 1rem;
        margin: 10px 0;
        color: #555;
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }

    .contact-form input,
    .contact-form textarea {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
        width: 100%;
    }

    .contact-form button {
        padding: 12px;
        background: #ff6f91;
        color: #fff;
        font-size: 1rem;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: 0.3s;
    }

    .contact-form button:hover {
        background: #ff9671;
    }
</style>