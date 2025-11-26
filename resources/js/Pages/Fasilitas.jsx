import { Head, Link } from '@inertiajs/react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function Fasilitas({ facilities }) {
  return (
    <>
      <Head title="Fasilitas - SD Negeri Leuwinanggung 1" />
      <Navbar />

      <section id="facility" className="py-16 bg-gray-50 mt-20">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12" data-aos="fade-up">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-800">Fasilitas Sekolah</h2>
            <div className="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full" />
            <p className="text-gray-600 max-w-3xl mx-auto">
              Fasilitas lengkap untuk mendukung proses pembelajaran yang optimal
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {facilities.map((facility, index) => (
              <div
                key={facility.id}
                className="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:-translate-y-2 hover:shadow-xl hover:shadow-green-100 hover:border hover:border-green-500/30 duration-300 ease-out"
                data-aos="zoom-in-up"
                data-aos-delay={50 * index}
              >
                {facility.image_path && (
                  <div className="h-48 overflow-hidden">
                    <img 
                      src={facility.image_path} 
                      alt={facility.name} 
                      className="w-full h-full object-cover"
                    />
                  </div>
                )}
                <div className="p-6">
                  <div className="flex items-start mb-3">
                    {facility.icon && (
                      <div className="text-3xl mr-3 flex-shrink-0">
                        {facility.icon}
                      </div>
                    )}
                    <h3 className="text-xl font-bold text-gray-800">{facility.name}</h3>
                  </div>
                  <p className="text-gray-600">{facility.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      <Footer />
    </>
  );
}
