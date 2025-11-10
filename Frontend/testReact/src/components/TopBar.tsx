// components/TopBar.tsx
import { NavLink, useNavigate } from "react-router-dom";

interface TopBarProps {
  onLogout: () => void;
}

export default function TopBar({ onLogout }: TopBarProps) {
  const navigate = useNavigate();
  const base = "transition-colors hover:text-blue-200";
  const active = "underline";

  const handleLogout = () => {
    onLogout();
    navigate("/login", { replace: true });
  };

  return (
    <nav className="w-full bg-blue-600 text-white shadow">
      <div className="mx-auto flex max-w-5xl items-center justify-between px-1 py-1">
        <span className="text-lg font-semibold">Mi Sitio</span>
        <ul className="flex gap-6 text-sm font-medium">
          <li>
            <NavLink
              to="/"
              className={({ isActive }) => `${base} ${isActive ? active : ""}`}
            >
              Home
            </NavLink>
          </li>

          <li>
            <NavLink
              to="/empleados"
              className={({ isActive }) => `${base} ${isActive ? active : ""}`}
            >
              Empleados
            </NavLink>
          </li>

          <li>
            <button
              type="button"
              onClick={handleLogout}
              className={`${base} cursor-pointer`}
            >
              Cerrar sesión
            </button>
          </li>
        </ul>
      </div>
    </nav>
  );
}
