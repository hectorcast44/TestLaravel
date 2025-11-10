export async function login(email: string, password: string) {
  const res = await fetch("http://localhost:8000/api/login", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email, password }),
  });

  if (!res.ok) throw new Error("Error al iniciar sesión");

  return res.json(); // datos del usuario o token
}

export async function register(
  name: string,
  email: string,
  password: string,
  password_confirmation: string
) {
  const res = await fetch("http://localhost:8000/api/register", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ name, email, password, password_confirmation }),
  });

  if (!res.ok) throw new Error("Error al iniciar sesión");

  return res.json(); // datos del usuario o token
}
