import { Head, Link } from '@inertiajs/react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function Profile({ schoolProfiles = {} }) {
  const visi = schoolProfiles.visi?.[0] || {};
  const misi = schoolProfiles.misi?.[0] || {};
  const tentang = schoolProfiles.tentang?.[0] || {};
  const sejarah = schoolProfiles.sejarah?.[0] || {};

  return (
    <>
      <Head title="Profil Sekolah - SD Negeri Leuwinanggung 1" />
      <Navbar />

      <section id="profile" className="py-16 bg-gray-50 mt-20">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12" data-aos="fade-up">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-800">Profil Sekolah</h2>
            <div className="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full" />
            <p className="text-gray-600 max-w-3xl mx-auto">
              {tentang.content ? (
                <span dangerouslySetInnerHTML={{ __html: tentang.content }} />
              ) : (
                'SD Negeri Leuwinanggung 1 adalah sekolah dasar negeri yang berkomitmen memberikan pendidikan berkualitas.'
              )}
            </p>
          </div>

          <div className="flex flex-col md:flex-row gap-8 items-center">
            <div className="w-full mb-8 md:w-1/2 md:mb-0 md:pr-8 flex justify-center" data-aos="fade-right">
              <div className="relative w-full h-[300px] sm:h-[350px] md:h-[400px] perspective-[1000px]">
                <div className="w-full h-full transition-transform duration-700 transform-style-preserve-3d hover:rotate-y-180">
                  <div className="absolute w-full h-full backface-hidden">
                    <img
                      src={tentang.image_path || '/storage/image/tentang.webp'}
                      alt="Gedung sekolah SD Negeri Leuwinanggung 1"
                      className="rounded-xl shadow-xl w-full h-full object-cover"
                    />
                  </div>
                  <div className="absolute w-full h-full rotate-y-180 backface-hidden rounded-xl shadow-xl overflow-hidden">
                    <img
                      src={tentang.image_path || '/storage/image/tentang.webp'}
                      alt="Gedung sekolah SD Negeri Leuwinanggung 1"
                      className="w-full h-full object-cover"
                    />
                    <div className="absolute inset-0 bg-black/50 flex items-center justify-center px-4">
                      <p className="text-white font-semibold text-xl text-center drop-shadow-lg leading-relaxed">
                        {tentang.title || 'SD Negeri Leuwinanggung 1'}
                        <br />
                        Pendidikan Berkualitas untuk Masa Depan
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="md:w-1/2" data-aos="fade-left">
              <h3 className="text-2xl font-bold text-gray-800 mb-4">{visi.title || 'Visi'}</h3>
              {visi.content ? (
                <div className="text-gray-700 mb-6" dangerouslySetInnerHTML={{ __html: visi.content }} />
              ) : (
                <p className="text-gray-700 mb-6">
                  Menjadi lembaga pendidikan dasar yang unggul dalam prestasi, berkarakter, dan berwawasan lingkungan.
                </p>
              )}

              <h3 className="text-2xl font-bold text-gray-800 mb-4">{misi.title || 'Misi'}</h3>
              {misi.content ? (
                <div className="text-gray-700 space-y-3" dangerouslySetInnerHTML={{ __html: misi.content }} />
              ) : (
                <ul className="text-gray-700 space-y-3">
                  <li className="flex items-start">
                    <i className="fas fa-check-circle text-green-600 mt-1 mr-2" />
                    <span>Menyelenggarakan pendidikan yang berkualitas</span>
                  </li>
                  <li className="flex items-start">
                    <i className="fas fa-check-circle text-green-600 mt-1 mr-2" />
                    <span>Mengembangkan karakter siswa yang berakhlak mulia</span>
                  </li>
                  <li className="flex items-start">
                    <i className="fas fa-check-circle text-green-600 mt-1 mr-2" />
                    <span>Menciptakan lingkungan belajar yang kondusif</span>
                  </li>
                </ul>
              )}
            </div>
          </div>

          {sejarah.content && (
            <div className="mt-12 bg-white rounded-lg shadow-md p-8" data-aos="fade-up">
              <h3 className="text-2xl font-bold text-gray-800 mb-4">{sejarah.title || 'Sejarah Sekolah'}</h3>
              <div className="text-gray-700" dangerouslySetInnerHTML={{ __html: sejarah.content }} />
            </div>
          )}
        </div>
      </section>

      <Footer />
    </>
  );
}
