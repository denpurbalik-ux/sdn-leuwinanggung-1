import { Head, Link } from '@inertiajs/react';
import { useEffect } from 'react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function Home({ sliders = [] }) {
  useEffect(() => {
    const slides = Array.from(document.querySelectorAll('.slide'));
    const dots = Array.from(document.querySelectorAll('.nav-dot'));
    let currentSlide = 0;

    const showSlide = (n) => {
      if (!slides.length) {
        return;
      }

      slides.forEach((slide) => slide.classList.remove('active'));
      dots.forEach((dot) => dot.classList.remove('active'));

      currentSlide = (n + slides.length) % slides.length;
      slides[currentSlide].classList.add('active');
      dots[currentSlide]?.classList.add('active');
    };

    const dotListeners = dots.map((dot, index) => {
      const handler = () => showSlide(index);
      dot.addEventListener('click', handler);
      return { dot, handler };
    });

    const intervalId = slides.length > 0 ? setInterval(() => showSlide(currentSlide + 1), 4000) : null;

    const backToTopBtn = document.getElementById('backToTop');
    const onScroll = () => {
      if (!backToTopBtn) {
        return;
      }

      if (window.pageYOffset > 300) {
        backToTopBtn.classList.remove('opacity-0', 'invisible');
      } else {
        backToTopBtn.classList.add('opacity-0', 'invisible');
      }
    };

    const backToTopHandler = () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.addEventListener('scroll', onScroll);
    backToTopBtn?.addEventListener('click', backToTopHandler);

    if (window.AOS) {
      window.AOS.init({
        duration: 1100,
        once: true,
      });
    }

    return () => {
      dotListeners.forEach(({ dot, handler }) => dot.removeEventListener('click', handler));
      if (intervalId) {
        clearInterval(intervalId);
      }

      window.removeEventListener('scroll', onScroll);
      backToTopBtn?.removeEventListener('click', backToTopHandler);
    };
  }, []);

  return (
    <>
      <Head title="SD Negeri Leuwinanggung 1 - Beranda" />
      <Navbar />

      <section id="home" className="hero-slider">
        {sliders.length > 0 ? (
          <>
            {sliders.map((slider, index) => (
              <div key={slider.id} className={`slide ${index === 0 ? 'active' : ''}`}>
                {slider.image_path && (
                  <img
                    src={slider.image_path}
                    alt={slider.title}
                    className="w-full h-full object-cover"
                  />
                )}
                <div className="slide-content">
                  <div className="container mx-auto px-4">
                    <h2 className="text-3xl md:text-4xl font-bold mb-4">{slider.title}</h2>
                    {slider.description && (
                      <p className="text-lg md:text-xl mb-6">{slider.description}</p>
                    )}
                    {slider.button_text && slider.button_link && (
                      <a
                        href={slider.button_link}
                        className="btn-primary px-6 py-3 rounded-full font-medium inline-block"
                      >
                        {slider.button_text}
                      </a>
                    )}
                  </div>
                </div>
              </div>
            ))}

            <div className="nav-dots">
              {sliders.map((_, index) => (
                <div
                  key={index}
                  className={`nav-dot ${index === 0 ? 'active' : ''}`}
                  data-slide={index}
                />
              ))}
            </div>
          </>
        ) : (
          <div className="slide active">
            <div className="slide-content">
              <div className="container mx-auto px-4">
                <h2 className="text-3xl md:text-4xl font-bold mb-4">Selamat Datang</h2>
                <p className="text-lg md:text-xl mb-6">Belum ada slider yang ditambahkan</p>
              </div>
            </div>
          </div>
        )}
      </section>

      {/* Section Highlight dengan link ke halaman terpisah */}
      <section className="py-16 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-800">Tentang SD Negeri Leuwinanggung 1</h2>
            <div className="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full" />
            <p className="text-gray-600 max-w-3xl mx-auto">
              Sekolah Dasar yang berkomitmen memberikan pendidikan berkualitas untuk masa depan anak-anak Indonesia
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <Link
              href="/profil"
              className="bg-white rounded-lg shadow-md p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
            >
              <div className="text-center">
                <div className="text-blue-600 text-5xl mb-4">
                  <i className="fas fa-school" />
                </div>
                <h3 className="text-2xl font-bold text-gray-800 mb-3">Profil Sekolah</h3>
                <p className="text-gray-600 mb-4">
                  Pelajari lebih lanjut tentang visi, misi, dan sejarah SD Negeri Leuwinanggung 1
                </p>
                <span className="text-blue-600 font-medium inline-flex items-center">
                  Selengkapnya <i className="fas fa-arrow-right ml-2" />
                </span>
              </div>
            </Link>

            <Link
              href="/program"
              className="bg-white rounded-lg shadow-md p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
            >
              <div className="text-center">
                <div className="text-green-600 text-5xl mb-4">
                  <i className="fas fa-graduation-cap" />
                </div>
                <h3 className="text-2xl font-bold text-gray-800 mb-3">Program Unggulan</h3>
                <p className="text-gray-600 mb-4">
                  Lihat berbagai program unggulan yang kami tawarkan untuk siswa-siswi kami
                </p>
                <span className="text-green-600 font-medium inline-flex items-center">
                  Selengkapnya <i className="fas fa-arrow-right ml-2" />
                </span>
              </div>
            </Link>

            <Link
              href="/fasilitas"
              className="bg-white rounded-lg shadow-md p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
            >
              <div className="text-center">
                <div className="text-orange-600 text-5xl mb-4">
                  <i className="fas fa-building" />
                </div>
                <h3 className="text-2xl font-bold text-gray-800 mb-3">Fasilitas</h3>
                <p className="text-gray-600 mb-4">
                  Fasilitas lengkap dan modern untuk mendukung proses pembelajaran yang optimal
                </p>
                <span className="text-orange-600 font-medium inline-flex items-center">
                  Selengkapnya <i className="fas fa-arrow-right ml-2" />
                </span>
              </div>
            </Link>
          </div>
        </div>
      </section>

      <Footer />

      <button
        id="backToTop"
        type="button"
        className="fixed bottom-8 right-8 bg-green-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300"
      >
        <i className="fas fa-arrow-up" />
      </button>
    </>
  );
}
