import { Link, usePage } from '@inertiajs/react';
import { useEffect } from 'react';

export default function Navbar() {
  const { footer } = usePage().props;

  useEffect(() => {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    const toggleMenu = () => {
      mobileMenu?.classList.toggle('hidden');
    };

    menuToggle?.addEventListener('click', toggleMenu);

    return () => {
      menuToggle?.removeEventListener('click', toggleMenu);
    };
  }, []);

  return (
    <nav className="bg-white shadow-lg sticky top-0 z-50">
      <div className="container mx-auto px-4 py-3 flex justify-between items-center">
        <div className="flex items-center">
          <img
            src={footer?.logo_path ? `/storage/${footer.logo_path}` : '/storage/image/imglogo.png'}
            alt={`Logo ${footer?.logo_name || 'SD Negeri Leuwinanggung 1'}`}
            className="mr-3"
            width="50"
            height="50"
          />
          <div>
            <h1 className="text-lg font-bold text-gray-800">{footer?.logo_name || 'SD Negeri Leuwinanggung 1'}</h1>
            <p className="text-xs text-gray-600">Pendidikan Berkualitas</p>
          </div>
        </div>
        <div className="hidden md:flex space-x-8">
          <Link href="/" className="text-gray-800 hover:text-green-700 font-medium">
            Beranda
          </Link>
          <Link href="/profil" className="text-gray-800 hover:text-green-700 font-medium">
            Profil
          </Link>
          <Link href="/program" className="text-gray-800 hover:text-green-700 font-medium">
            Program
          </Link>
          <Link href="/fasilitas" className="text-gray-800 hover:text-green-700 font-medium">
            Fasilitas
          </Link>
          <Link href="/kontak" className="text-gray-800 hover:text-green-700 font-medium">
            Kontak
          </Link>
        </div>
        <button id="menu-toggle" className="md:hidden text-gray-800 focus:outline-none" type="button">
          <i className="fas fa-bars text-xl" />
        </button>
      </div>
      <div id="mobile-menu" className="md:hidden hidden px-4 pb-4">
        <Link href="/" className="block py-2 text-gray-800 hover:text-green-700 font-medium">
          Beranda
        </Link>
        <Link href="/profil" className="block py-2 text-gray-800 hover:text-green-700 font-medium">
          Profil
        </Link>
        <Link href="/program" className="block py-2 text-gray-800 hover:text-green-700 font-medium">
          Program
        </Link>
        <Link href="/fasilitas" className="block py-2 text-gray-800 hover:text-green-700 font-medium">
          Fasilitas
        </Link>
        <Link href="/kontak" className="block py-2 text-gray-800 hover:text-green-700 font-medium">
          Kontak
        </Link>
      </div>
    </nav>
  );
}
