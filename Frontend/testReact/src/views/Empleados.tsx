import React, { useEffect, useState } from "react";
import TopBar from "../components/TopBar";

interface EmpleadosProps {
  onLogout: () => void;
}

const Empleados = ({ onLogout }: EmpleadosProps) => {
  const [empleados, setEmpleados] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(false);
  const fetchEmpleados = async () => {
    try {
      const urlAPI = "http://localhost:8000/api/empleados";

      const response = await fetch(urlAPI);

      if (!response.ok) {
        throw new Error(`Error en la petición: ${response.status}`);
      }

      const data = await response.json();
      console.log(empleados);
      setEmpleados(data);
      setError(false);
    } catch (err) {
      setError(true);
    } finally {
      setIsLoading(false);
    }
  };

  useEffect(() => {
    fetchEmpleados();
  }, []);

  return (
    <main>
      <TopBar onLogout={onLogout} />
      <table></table>
    </main>
  );
};

export default Empleados;
