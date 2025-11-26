import { Head, Link } from '@inertiajs/react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function ProgramDetail({ program }) {
  return (
    <>
      <Head title={`${program.title} - SD Negeri Leuwinanggung 1`} />
      <Navbar />

      <section className="py-16 bg-white mt-20">
        <div className="container mx-auto px-4">
          {/* Breadcrumb */}
          <nav className="mb-8" data-aos="fade-up">
            <ol className="flex items-center space-x-2 text-sm">
              <li>
                <Link href="/" className="text-blue-600 hover:text-blue-800">
                  Beranda
                </Link>
              </li>
              <li className="text-gray-500">
                <i className="fas fa-chevron-right text-xs"></i>
              </li>
              <li>
                <Link href="/program" className="text-blue-600 hover:text-blue-800">
                  Program
                </Link>
              </li>
              <li className="text-gray-500">
                <i className="fas fa-chevron-right text-xs"></i>
              </li>
              <li className="text-gray-700 font-medium">{program.title}</li>
            </ol>
          </nav>

          <div className="max-w-4xl mx-auto">
            {/* Header Section */}
            <div className="mb-8" data-aos="fade-up" data-aos-delay="100">
              {program.is_featured && (
                <div className="inline-block mb-4">
                  <span className="bg-gradient-to-r from-yellow-400 to-orange-400 text-white text-sm font-bold py-2 px-4 rounded-full">
                    ⭐ PROGRAM UNGGULAN
                  </span>
                </div>
              )}
              
              <h1 className="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {program.title}
              </h1>
              
              <div className="flex items-center text-gray-600 mb-6">
                <i className="fas fa-calendar-alt mr-2"></i>
                <span>Dipublikasikan: {program.published_at}</span>
              </div>
              
              <p className="text-lg text-gray-700 leading-relaxed">
                {program.description}
              </p>
            </div>

            {/* Featured Image */}
            <div className="mb-8" data-aos="zoom-in" data-aos-delay="200">
              <div className="rounded-lg overflow-hidden shadow-lg">
                <img
                  src={program.image}
                  alt={program.title}
                  className="w-full h-64 md:h-96 object-cover"
                />
              </div>
            </div>

            {/* Content Section */}
            <div className="mb-12" data-aos="fade-up" data-aos-delay="300">
              <div 
                className="prose prose-lg max-w-none text-gray-700 leading-relaxed"
                dangerouslySetInnerHTML={{ __html: program.content }}
              />
            </div>

            {/* Navigation Buttons */}
            <div className="flex justify-between items-center pt-8 border-t" data-aos="fade-up" data-aos-delay="400">
              <Link
                href="/program"
                className="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200"
              >
                <i className="fas fa-arrow-left mr-2"></i>
                Kembali ke Program
              </Link>
              
              <div className="text-center">
                <p className="text-gray-600 mb-2">Bagikan program ini:</p>
                <div className="flex space-x-3">
                  <button
                    onClick={() => {
                      if (navigator.share) {
                        navigator.share({
                          title: program.title,
                          text: program.description,
                          url: window.location.href,
                        });
                      } else {
                        navigator.clipboard.writeText(window.location.href);
                        alert('Link berhasil disalin!');
                      }
                    }}
                    className="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition-colors duration-200"
                    title="Bagikan"
                  >
                    <i className="fas fa-share-alt"></i>
                  </button>
                  <button
                    onClick={() => {
                      const url = `https://wa.me/?text=${encodeURIComponent(`${program.title} - ${window.location.href}`)}`;
                      window.open(url, '_blank');
                    }}
                    className="p-2 bg-green-500 hover:bg-green-600 text-white rounded-full transition-colors duration-200"
                    title="Bagikan via WhatsApp"
                  >
                    <i className="fab fa-whatsapp"></i>
                  </button>
                </div>
              </div>
            </div>

            {/* Related Programs CTA */}
            <div className="mt-12 p-8 bg-gradient-to-r from-blue-50 to-green-50 rounded-lg text-center" data-aos="fade-up" data-aos-delay="500">
              <h3 className="text-2xl font-bold text-gray-800 mb-4">
                Ingin Tahu Program Lainnya?
              </h3>
              <p className="text-gray-600 mb-6">
                Jelajahi program-program unggulan lainnya yang tersedia di SD Negeri Leuwinanggung 1
              </p>
              <Link
                href="/program"
                className="inline-flex items-center px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
              >
                <i className="fas fa-list mr-2"></i>
                Lihat Semua Program
              </Link>
            </div>
          </div>
        </div>
      </section>

      <Footer />
    </>
  );
}