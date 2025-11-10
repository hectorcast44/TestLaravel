import { Routes, Route, Navigate } from "react-router-dom";
import { useState, useEffect, type JSX } from "react";
import Login from "./views/Login";
import Register from "./views/Register";
import Empleados from "./views/Empleados";
import Home from "./views/Home";

function ProtectedRoute({
  children,
  isAuth,
}: {
  children: JSX.Element;
  isAuth: boolean;
}) {
  if (!isAuth) {
    return <Navigate to="/login" replace />;
  }
  return children;
}

export default function App() {
  const [token, setToken] = useState<string | null>(() => {
    return localStorage.getItem("token");
  });

  useEffect(() => {
    if (token) {
      localStorage.setItem("token", token);
    } else {
      localStorage.removeItem("token");
    }
  }, [token]);

  const isAuth = Boolean(token);
  const handleLogout = () => setToken(null);

  return (
    <Routes>
      <Route
        path="/login"
        element={
          isAuth ? (
            <Navigate to="/empleados" replace />
          ) : (
            <Login onLogin={setToken} />
          )
        }
      />
      <Route
        path="/register"
        element={
          isAuth ? (
            <Navigate to="/empleados" replace />
          ) : (
            <Register onRegister={setToken} />
          )
        }
      />

      <Route
        path="/empleados"
        element={
          <ProtectedRoute isAuth={isAuth}>
            <Empleados onLogout={handleLogout} />
          </ProtectedRoute>
        }
      />

      <Route
        path="/"
        element={
          <ProtectedRoute isAuth={isAuth}>
            <Home onLogout={handleLogout} />
          </ProtectedRoute>
        }
      />

      <Route path="*" element={<Navigate to="/login" />} />
    </Routes>
  );
}
