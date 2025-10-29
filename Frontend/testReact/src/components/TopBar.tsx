import React from "react";

interface TopBarProps {
  onSelect: (vista: string) => void;
}

function TopBar({ onSelect }: TopBarProps) {
  return (
    <nav className="w-full bg-blue-600 text-white shadow">
      <div className="mx-auto flex max-w-5xl items-center justify-between px-1 py-1">
        <span className="text-lg font-semibold">Mi Sitio</span>
        <ul className="flex gap-6 text-sm font-medium">
          <li className="transition-colors hover:text-blue-200 cursor-pointer">
            <button onClick={() => onSelect("Home")}>Home</button>
          </li>

          <li className="transition-colors hover:text-blue-200 cursor-pointer">
            <button onClick={() => onSelect("Empleados")}>Empleado</button>
          </li>
        </ul>
      </div>
    </nav>
  );
}

export default TopBar;
