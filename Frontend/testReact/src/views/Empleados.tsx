import React, { useEffect, useState } from "react";

const Empleados = () => {
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

      const dataCompleta = await response.json();
      const empleados = dataCompleta.data;
      setEmpleados(empleados);
      console.log(empleados);
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

  return <table></table>;
};

export default Empleados;
