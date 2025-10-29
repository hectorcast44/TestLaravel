import TopBar from "./components/topBar";
import "./App.css";
import { useState } from "react";
import Empleados from "./views/Empleados";

function App() {
  const [vista, setVista] = useState("empleados");

  const render = () => {
    switch (vista) {
      case "Home":
        return <h1>Home</h1>;
      case "Empleados":
        return <Empleados />;
    }
  };

  return (
    <>
      <TopBar onSelect={setVista} />
      <main className="p-4">{render()}</main>
    </>
  );
}

export default App;
