import { useState } from "react";
import { register } from "../api/aut";
import { useNavigate } from "react-router-dom";

interface RegisterProps {
  onRegister: (token: string) => void;
}

export default function Register({ onRegister }: RegisterProps) {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
  });

  const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();

    if (
      !form.name ||
      !form.email ||
      !form.password ||
      !form.password_confirmation
    ) {
      return "completar campos";
    }
    console.log("datos por registrar:", form.name, form.email, form.password);
    try {
      const data = await register(
        form.name,
        form.email,
        form.password,
        form.password_confirmation
      );
      console.log("✅ Registro exitoso:", data);
      const token = data?.access_token ?? data?.token;
      if (!token) {
        throw new Error("Respuesta de login sin token");
      }
      onRegister(token);
      navigate("/empleados");
    } catch (err) {
      console.error("❌ Error en registro:", err);
    } finally {
      setForm({ name: "", email: "", password: "", password_confirmation: "" });
    }
  };
  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-100">
      <form
        onSubmit={handleSubmit}
        className="bg-white shadow-lg rounded-xl p-8 w-full max-w-sm"
      >
        <h2 className="text-2xl font-bold mb-6 text-center text-[#002E5F]">
          Crear cuenta
        </h2>

        <label className="block mb-2 text-sm font-semibold">Nombre:</label>
        <input
          type="text"
          name="name"
          value={form.name}
          onChange={(e) => setForm({ ...form, name: e.target.value })}
          className="w-full border rounded-lg px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-[#C79316]"
          placeholder="Nombre completo"
        />

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

        <label className="block mb-2 text-sm font-semibold">
          Confirmar contraseña:
        </label>
        <input
          type="password"
          name="password_confirmation"
          value={form.password_confirmation}
          onChange={(e) =>
            setForm({ ...form, password_confirmation: e.target.value })
          }
          className="w-full border rounded-lg px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-[#C79316]"
          placeholder="********"
        />

        <button
          type="submit"
          className="w-full bg-[#002E5F] text-white py-2 rounded-lg hover:bg-[#C79316] transition-colors"
        >
          Registrarme
        </button>

        <button
          type="button"
          onClick={() => navigate("/login")}
          className="w-full mt-4 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transition-colors"
        >
          Volver al login
        </button>
      </form>
    </div>
  );
}
