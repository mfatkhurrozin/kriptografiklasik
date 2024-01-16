<li class="nav-item">
    <a href="{{'home'}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Beranda
      </p>
    </a>
</li>

@if ($users->level ==1)
<li class="nav-header">KRIPTOGRAFI KLASIK</li>
<li class="nav-item">
  <a href="{{url('zigzag')}}" class="nav-link">
    <i class="nav-icon fas fa-lock"></i>
    <p>
      Zig Zag Cipher
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{url('shift')}}" class="nav-link">
    <i class="nav-icon fas fa-lock"></i>
    <p>
      Shift Cipher
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{url('atbash')}}" class="nav-link">
    <i class="nav-icon fas fa-lock"></i>
    <p>
      Atbash Cipher
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{url('vigenere')}}" class="nav-link">
    <i class="nav-icon fas fa-lock"></i>
    <p>
      Vigenere Cipher
    </p>
  </a>
</li>

@endif