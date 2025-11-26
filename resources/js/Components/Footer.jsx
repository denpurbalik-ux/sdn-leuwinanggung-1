import { Link, usePage } from '@inertiajs/react';

export default function Footer() {
  const { footer } = usePage().props;

  const renderContactIcon = (iconString) => {
    if (iconString && iconString.length <= 3) {
      return <span className="text-xl">{iconString}</span>;
    }
    if (iconString && iconString.includes('fa-')) {
      return <i className={iconString} />;
    }
    return <span className="text-xl">{iconString}</span>;
  };

  return (
    <footer className="bg-gray-900 text-white py-12">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h3 className="text-xl font-bold mb-4">Tentang Kami</h3>
            <p className="text-gray-400 mb-4">
              {footer?.about_text || 'SD Negeri Leuwinanggung 1 adalah sekolah dasar negeri yang berkomitmen memberikan pendidikan berkualitas untuk generasi masa depan.'}
            </p>
            <div className="flex space-x-4">
              {footer?.social_media?.map((social) => (
                <a
                  key={social.id}
                  href={social.url}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-gray-400 hover:text-green-500 text-xl"
                  aria-label={social.name}
                >
                  <i className={social.icon} />
                </a>
              ))}
            </div>
          </div>

          <div>
            <h3 className="text-xl font-bold mb-4">Link Cepat</h3>
            <ul className="space-y-2">
              <li>
                <Link href="/" className="text-gray-400 hover:text-green-500">
                  Beranda
                </Link>
              </li>
              <li>
                <Link href="/profil" className="text-gray-400 hover:text-green-500">
                  Profil Sekolah
                </Link>
              </li>
              <li>
                <Link href="/program" className="text-gray-400 hover:text-green-500">
                  Program
                </Link>
              </li>
              <li>
                <Link href="/fasilitas" className="text-gray-400 hover:text-green-500">
                  Fasilitas
                </Link>
              </li>
              <li>
                <Link href="/kontak" className="text-gray-400 hover:text-green-500">
                  Kontak
                </Link>
              </li>
            </ul>
          </div>

          <div>
            <h3 className="text-xl font-bold mb-4">Kontak Kami</h3>
            <div className="space-y-4">
              {footer?.contacts?.map((contact) => (
                <div key={contact.id} className="flex items-start">
                  <div className="text-green-600 text-xl mr-4 mt-1">
                    {renderContactIcon(contact.icon)}
                  </div>
                  <div>
                    <p className="text-gray-400">{contact.value}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        <div className="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
          <p>{footer?.copyright_text || '© 2025 SD Negeri Leuwinanggung 1. All Rights Reserved.'}</p>
        </div>
      </div>
    </footer>
  );
}
