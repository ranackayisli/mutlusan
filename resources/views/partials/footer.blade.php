{{--
    Kaynak: mutlusan.com.tr footer ekran görüntüsü (menü yapısı)
    + post.mutlusan.com.tr footer (şirket açıklaması, rakamlar, sosyal medya - doğrulandı)
    Hâlâ eksik: "Size Ulaşabilmemiz İçin" kırmızı barının tam içeriği (telefon/form) -
    ekran görüntüsünde kesik kalmıştı, tam görüntüyü atarsan onu da ekleriz.
--}}

<!-- Size Ulaşabilmemiz İçin - CTA şeridi -->
<div class="bg-mutlusan-red">
    <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4">
        <span class="text-white font-semibold tracking-wide">Size Ulaşabilmemiz İçin</span>
        <a href="{{ url('/iletisim') }}"
           class="inline-flex items-center px-7 py-2.5 bg-white text-mutlusan-red font-semibold rounded-full hover:bg-mutlusan-gray-light transition-colors">
            İletişim Formu
        </a>
    </div>
</div>

<footer class="bg-mutlusan-gray-dark text-white/80">
    <div class="max-w-7xl mx-auto px-6 py-16 grid sm:grid-cols-2 lg:grid-cols-5 gap-10">

        <div class="lg:col-span-1">
            <img src="{{ asset('images/mutlusan-logo-white.png') }}" alt="Mutlusan Electric" class="h-22 w-auto mb-4">
          
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4 text-sm tracking-wide">Kurumsal</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors">Hakkımızda</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Vizyon ve Misyon</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Kurumsal Logo</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Kurumsal Tanıtım Filmi</a></li>
                <li><a href="#" class="hover:text-white transition-colors">İnsan Kaynakları</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Bilgi Toplumu</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Başkanın Mesajı</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4 text-sm tracking-wide">Dokümanlar</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors">E-Katalog & Broşür</a></li>
                <li><a href="#" class="hover:text-white transition-colors">E-Fiyat Listesi</a></li>
                <li><a href="#" class="hover:text-white transition-colors">E-Dergi</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Basın Bültenleri</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Kurumsal Kimlik Kılavuzu</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Diğer</a></li>
                <li><a href="#" class="hover:text-white transition-colors">E-Kalite Belgeleri</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4 text-sm tracking-wide">Sosyal Sorumluluk</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors">Genel Bakış</a></li>
            </ul>

            <h4 class="text-white font-semibold mb-4 mt-8 text-sm tracking-wide">İnsan Kaynakları</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors">İnsan Kaynakları Politikası</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Açık Pozisyonlar</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-4 text-sm tracking-wide">Bilgi Toplumu</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-white transition-colors">Bilgi Toplumu</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Bilgi Güvenliği Politikası</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Kalite–İSG</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Kişisel Verilerin İşlenmesi Aydınlatma Metni</a></li>
                <li><a href="#" class="hover:text-white transition-colors">KVKK Veri Sorumlusu Başvuru Formu</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Bilgi Toplumu Hizmetleri</a></li>
                <li><a href="#" class="hover:text-white transition-colors">Çerez Kullanımı Hakkında</a></li>
            </ul>
        </div>

    </div>

    <div class="border-t border-white/10 py-6">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-xs text-white/40">&copy; {{ date('Y') }} Mutlusan Electric. Tüm hakları saklıdır.</span>
            <div class="flex gap-3">
                <a href="https://www.facebook.com/MutlusanPlastikElektrik" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-mutlusan-red transition-colors text-xs" aria-label="Facebook">FB</a>
                <a href="https://www.instagram.com/mutlusanelectric/" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-mutlusan-red transition-colors text-xs" aria-label="Instagram">IG</a>
                <a href="https://tr.linkedin.com/company/mutlusan" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-mutlusan-red transition-colors text-xs" aria-label="LinkedIn">IN</a>
                <a href="https://www.youtube.com/@MutlusanElectric" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-mutlusan-red transition-colors text-xs" aria-label="YouTube">YT</a>
            </div>
        </div>
    </div>
</footer>
