import TopBar from "../components/TopBar";

export default function Home({ onLogout }: { onLogout: () => void }) {
  return (
    <div>
      <TopBar onLogout={onLogout} />
      <h1>Bienvenido a la página de inicio</h1>
    </div>
  );
}
