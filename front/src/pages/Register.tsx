import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import AuthCard from "../components/AuthCard";

type Errors = {
  [key: string]: string[];
};

const Register: React.FC = () => {
  const [name, setName] = useState<string>("");
  const [email, setEmail] = useState<string>("");
  const [password, setPassword] = useState<string>("");
  const [passwordConfirmation, setPasswordConfirmation] = useState<string>("");
  const [errorMessages, setErrorMessages] = useState<string[]>([]);
  const navigate = useNavigate();

  const handleRegister = async (e: React.FormEvent) => {
    e.preventDefault();

    const response = await fetch("http://localhost:9000/api/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        name,
        email,
        password,
        password_confirmation: passwordConfirmation,
      }),
    });

    const data = await response.json();
    if (response.ok) {
      alert("登録が完了しました！ログインしてください。");
      navigate("/login");
    } else {
      const errors: Errors = data.errors;
      const messages = Object.values(errors).flat();
      setErrorMessages(messages);
    }
  };

  return (
    <AuthCard title="ユーザー登録">
          {errorMessages.length > 0 && (
        <ul className="text-red-500 text-sm mb-4">
          {errorMessages.map((err, index) => (
            <li key={index}>{err}</li>
          ))}
        </ul>
      )}
      <form onSubmit={handleRegister} className="space-y-4">
        <input
          type="text"
          placeholder="名前"
          value={name}
          onChange={(e) => setName(e.target.value)}
          className="w-full border rounded-md px-3 py-2"
          required
        />
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
        <input
          type="password"
          placeholder="パスワード確認"
          value={passwordConfirmation}
          onChange={(e) => setPasswordConfirmation(e.target.value)}
          className="w-full border rounded-md px-3 py-2"
          required
        />
        <button
          type="submit"
          className="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600"
        >
          登録
        </button>
      </form>
      <p className="text-sm text-center mt-4">
        アカウントをお持ちの方は <a href="/login" className="text-blue-500 hover:underline">こちら</a>
      </p>
    </AuthCard>
  );
};

export default Register;
