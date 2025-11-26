import { Head, Link } from '@inertiajs/react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function Program({ programs = [] }) {

  return (
    <>
      <Head title="Program - SD Negeri Leuwinanggung 1" />
      <Navbar />

      <section id="program" className="py-16 bg-white mt-20">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-800">Program Unggulan</h2>
            <div className="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full" />
            <p className="text-gray-600 max-w-3xl mx-auto">
              Berbagai program unggulan yang kami tawarkan untuk pengembangan potensi siswa
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {programs.length > 0 ? (
              programs.map((program, index) => (
                <div
                  key={program.id}
                  className={`program-card bg-white rounded-lg shadow-md overflow-hidden ${
                    program.is_featured ? 'ring-2 ring-yellow-200' : ''
                  }`}
                  data-aos="zoom-in"
                  data-aos-delay={100 * (index + 1)}
                >
                  {program.is_featured && (
                    <div className="featured-badge text-white text-xs font-bold py-2 px-3">
                      ⭐ PROGRAM UNGGULAN
                    </div>
                  )}
                  <div className="h-48 overflow-hidden">
                    <img
                      src={program.image}
                      alt={program.title}
                      className="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                    />
                  </div>
                  <div className="p-6">
                    <div className="flex justify-between items-start mb-2">
                      <h3 className="text-xl font-bold text-gray-800 line-clamp-2">{program.title}</h3>
                      <span className="text-xs text-gray-500 ml-2 whitespace-nowrap">{program.published_at}</span>
                    </div>
                    <p className="text-gray-600 mb-4 line-clamp-3">{program.description}</p>
                    <Link 
                      href={`/program/${program.slug}`}
                      className="text-green-600 font-medium flex items-center group mt-auto hover:text-green-700 transition-colors duration-200"
                    >
                      Selengkapnya
                      <i className="fas fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1" />
                    </Link>
                  </div>
                </div>
              ))
            ) : (
              <div className="col-span-3 text-center py-12">
                <div className="text-gray-400 text-6xl mb-4">
                  <i className="fas fa-clipboard-list"></i>
                </div>
                <h3 className="text-xl font-semibold text-gray-600 mb-2">Belum Ada Program</h3>
                <p className="text-gray-500">Program sekolah akan ditampilkan di sini.</p>
              </div>
            )}
          </div>
        </div>
      </section>

      <Footer />
    </>
  );
}
