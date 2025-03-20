import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import AuthCard  from "../components/AuthCard";
import { useAuth } from "../context/AuthContext";

const Login: React.FC = () => {
  const [email, setEmail] = useState<string>("");
  const [password, setPassword] = useState<string>("");
  const [error, setError] = useState<string>("");
  const navigate = useNavigate();
  const { login } = useAuth();

  const handleLogin = async (e: React.FormEvent) => {
    e.preventDefault();

    await fetch("http://localhost:9000/sanctum/csrf-cookie", {
      credentials: "include",
    });

    const response = await fetch("http://localhost:9000/api/login", {
      method: "POST",
      credentials: "include",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email, password }),
    });

    if (!response.ok) {
      setError("ログインに失敗しました。");
      return;
    }

    const data = await response.json();
    console.log(data);

    if (response.ok) {
      login(data.token);  // ✅ tokenを保存
      navigate("/dashboard");
    } else {
      setError("ログインに失敗しました。");
    }
  };

  return (
    <AuthCard title="ログイン">
      {error && <p className="text-red-500 text-sm mb-4">{error}</p>}
      <form onSubmit={handleLogin} className="space-y-4">
        <input
          type="email"
          placeholder="メールアドレス"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          className="w-full border rounded-md px-3 py-2"
          required
        />
        <input
          type="password"
          placeholder="パスワード"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          className="w-full border rounded-md px-3 py-2"
          required
        />
        <button
          type="submit"
          className="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600"
        >
          ログイン
        </button>
      </form>
      <p className="text-sm text-center mt-4">
        アカウントをお持ちでない方は <a href="/register" className="text-blue-500 hover:underline">こちら</a>
      </p>
    </AuthCard>
  );
};

export default Login;
