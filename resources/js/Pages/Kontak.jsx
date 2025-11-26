import { Head, Link, usePage } from '@inertiajs/react';
import Navbar from '../Components/Navbar';
import Footer from '../Components/Footer';

export default function Kontak({ contacts }) {
  const { footer } = usePage().props;
  
  // Debug: log footer data
  console.log('Footer data:', footer);
  console.log('Map embed URL:', footer?.map_embed_url);
  
  // Group contacts by type for easier rendering
  const contactsMap = contacts.reduce((acc, contact) => {
    acc[contact.type] = contact;
    return acc;
  }, {});

  // Extract URL from iframe HTML if needed
  const getMapUrl = (mapEmbedUrl) => {
    if (!mapEmbedUrl) return null;
    
    // If it's already just a URL, return it
    if (mapEmbedUrl.startsWith('http')) {
      return mapEmbedUrl;
    }
    
    // If it's an iframe HTML, extract the src
    const match = mapEmbedUrl.match(/src="([^"]+)"/);
    return match ? match[1] : null;
  };

  const renderContactIcon = (iconString) => {
    // If it's an emoji or starts with emoji, render as-is
    if (iconString && iconString.length <= 3) {
      return <span className="text-2xl">{iconString}</span>;
    }
    // If it's a FontAwesome class
    if (iconString && iconString.includes('fa-')) {
      return <i className={iconString} />;
    }
    return <span className="text-2xl">{iconString}</span>;
  };

  const renderContactValue = (value) => {
    return value.split('\n').map((line, index) => (
      <p key={index} className="text-gray-600">
        {line}
      </p>
    ));
  };

  return (
    <>
      <Head title="Kontak - SD Negeri Leuwinanggung 1" />
      <Navbar />

      <section id="contact" className="py-16 bg-gray-50 mt-20">
        <div className="container mx-auto px-4">
          <div className="text-center mb-12">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-800">Hubungi Kami</h2>
            <div className="section-divider mx-auto my-4 w-24 h-1 bg-blue-600 rounded-full" />
            <p className="text-gray-600 max-w-3xl mx-auto">
              Kami siap menjawab pertanyaan Anda tentang SD Negeri Leuwinanggung 1
            </p>
          </div>

          <div className="flex flex-col lg:flex-row gap-8">
            <div className="lg:w-1/2">
              <div className="bg-white p-8 rounded-lg shadow-md">
                <h3 className="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                <form>
                  <div className="mb-4">
                    <label htmlFor="name" className="block text-gray-700 mb-2">
                      Nama Lengkap
                    </label>
                    <input
                      type="text"
                      id="name"
                      className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    />
                  </div>
                  <div className="mb-4">
                    <label htmlFor="email" className="block text-gray-700 mb-2">
                      Email
                    </label>
                    <input
                      type="email"
                      id="email"
                      className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    />
                  </div>
                  <div className="mb-4">
                    <label htmlFor="phone" className="block text-gray-700 mb-2">
                      Nomor Telepon
                    </label>
                    <input
                      type="tel"
                      id="phone"
                      className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    />
                  </div>
                  <div className="mb-4">
                    <label htmlFor="message" className="block text-gray-700 mb-2">
                      Pesan
                    </label>
                    <textarea
                      id="message"
                      rows="4"
                      className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"
                    />
                  </div>
                  <button type="submit" className="btn-primary px-6 py-3 rounded-full font-medium w-full">
                    Kirim Pesan
                  </button>
                </form>
              </div>
            </div>

            <div className="lg:w-1/2 space-y-6">
              <div className="bg-white p-8 rounded-lg shadow-md">
                <h3 className="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                <div className="space-y-4">
                  {contacts.map((contact) => (
                    <div key={contact.id} className="flex items-start">
                      <div className="text-green-600 text-xl mr-4 mt-1">
                        {renderContactIcon(contact.icon)}
                      </div>
                      <div>
                        <h4 className="font-bold text-gray-800">{contact.label}</h4>
                        {contact.link ? (
                          <a
                            href={contact.link}
                            className="text-gray-600 hover:text-green-600"
                            target={contact.type === 'address' ? '_blank' : undefined}
                            rel={contact.type === 'address' ? 'noopener noreferrer' : undefined}
                          >
                            {renderContactValue(contact.value)}
                          </a>
                        ) : (
                          renderContactValue(contact.value)
                        )}
                      </div>
                    </div>
                  ))}
                </div>
              </div>

              {footer?.map_embed_url && (() => {
                const mapUrl = getMapUrl(footer.map_embed_url);
                return mapUrl ? (
                  <div className="bg-white rounded-lg shadow-md overflow-hidden">
                    <div className="h-80 w-full">
                      <iframe
                        src={mapUrl}
                        width="100%"
                        height="100%"
                        style={{ border: 0 }}
                        allowFullScreen
                        loading="lazy"
                        title="Peta Lokasi SD Negeri Leuwinanggung 1"
                        aria-label="Peta digital yang menampilkan lokasi SD Negeri Leuwinanggung 1"
                      />
                    </div>
                  </div>
                ) : null;
              })()}
            </div>
          </div>
        </div>
      </section>

      <Footer />
    </>
  );
}
