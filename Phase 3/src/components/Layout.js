import React, { Component } from 'react';
import TopNav from './TopNav';
import { Outlet } from "react-router-dom";
import './layout.css';
import facebook from './images/facebook.png'
import insta from './images/instagram.png'
import wap from './images/whatsapp.png'



export default class Layout extends Component {
  render() {
    return (
        <>
        <TopNav />
        <Outlet />
        <footer>
          <img src={facebook} alt={""} />
          <img src={insta} alt={""} />
          <img src={wap} alt={""} />
        </footer>
      </>
    )
  }
}
