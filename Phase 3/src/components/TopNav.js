import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import image from './images/logo.JPG'


export default class TopNav extends Component {
  styles = {margin: '10px', color: 'white', textDecoration: 'none', fontWeight: '600', fontSize: '16px'};

  render() {
    return (
      <header style={{width: '100%'}}>
        <div class="head-content">
            <img src={image} alt="" class={"logo"} />
            <h1>Mercado Escolar Students Shopping Platform</h1>
        </div>
        <form action="" className="search">
            <input type="text" />
            <input type="submit" value="Search" />
        </form>
        <nav id='header-nav'>
            <Link to="/" className="links">Home</Link>
            <Link to="about" className="links">About</Link>
            <a href="http://vxa3605.uta.cloud/" className="links">Blog</a>
            <Link to="contact" className="links">Contact</Link>
            <Link to="register" className="links">Register Student</Link>
            <Link to="register" className="links">Register Business Owner</Link>
            <Link to="register" className="links">Register School Admin</Link>
            <Link to="business" className="links">Business Owner</Link>
            <Link to="school" className="links">School Admin</Link>
            <Link to="super-admin" className="links">Super Admin</Link>
            <Link to="student" className="links">Student Page</Link>
        </nav>
    </header>
    )
  }
}
