import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { login } from "../api/aut";

interface LoginProps {
  onLogin: (token: string) => void;
}

export default function Login({ onLogin }: LoginProps) {
  const [form, setForm] = useState({ email: "", password: "" });
  const navigate = useNavigate();

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!form.email || !form.password) {
      return "Completar los campos";
    }
    console.log("🔐 Credenciales enviadas:", form.email, form.password);
    try {
      const data = await login(form.email, form.password);
      console.log("✅ Login exitoso:", data);
      const token = data?.access_token ?? data?.token;
      if (!token) {
        throw new Error("Respuesta de login sin token");
      }
      onLogin(token);
      navigate("/empleados");
    } catch (err) {
      console.error("❌ Error en login:", err);
    } finally {
      setForm({ email: "", password: "" });
    }
  };

  const navigateRegister = () => {
    navigate("/register");
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-100">
      <form
        onSubmit={handleSubmit}
        className="bg-white shadow-lg rounded-xl p-8 w-full max-w-sm"
      >
        <h2 className="text-2xl font-bold mb-6 text-center text-[#002E5F]">
          Iniciar sesión
        </h2>

        <label className="block mb-2 text-sm font-semibold">Correo:</label>
        <input
          type="email"
          name="email"
          value={form.email}
          onChange={(e) => setForm({ ...form, email: e.target.value })}
          className="w-full border rounded-lg px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#C79316]"
          placeholder="ejemplo@correo.com"
        />

        <label className="block mb-2 text-sm font-semibold">Contraseña:</label>
        <input
          type="password"
          name="password"
          value={form.password}
          onChange={(e) => setForm({ ...form, password: e.target.value })}
          className="w-full border rounded-lg px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-[#C79316]"
          placeholder="********"
        />

        <label className="flex items-center gap-2">
          <input type="checkbox" />
          Recordar usuario
        </label>

        <div className="flex items-center justify-between mb-6">
          <a href="#" className="text-sm text-[#C79316] hover:underline">
            ¿Olvidaste tu contraseña?
          </a>
        </div>

        <button
          type="submit"
          className="w-full bg-[#002E5F] text-white py-2 rounded-lg hover:bg-[#C79316] transition-colors"
        >
          Entrar
        </button>

        <button
          type="button"
          onClick={navigateRegister}
          className="w-full mt-4 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-colors"
        >
          Registrarse
        </button>
      </form>
    </div>
  );
}
