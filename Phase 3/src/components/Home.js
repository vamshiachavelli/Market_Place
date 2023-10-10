import React from 'react'
import { Link } from 'react-router-dom';
import image from './images/woman.JPG'

export default function Home() {
  return (
    <section class="container">
        <aside class="sidebar">
            <p>User Login</p>
            <form action="">
                <label for="name">User Name:</label>
                <input type="text" id="name" name="name" />
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" />
                <input type="submit" value="Login" />
            </form>
            <div class="frmlink">
                <Link to="forget">Forget Password</Link>
                <br />
                <Link to="register">Register</Link>
            </div>
        </aside>

        <div class="content">
            <img src={image} alt="" />
            <div class="note">
                <p>We have all you need</p>
                <p>Just order, we deliver</p>
            </div>
        </div>
    </section>
  )
}
