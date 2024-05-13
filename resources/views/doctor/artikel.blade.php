@extends('layouts.doctorArtLay')

@section('contents')
    <section class="artikel" id="artikel">
        <div class="left-side">
            <h2>Kategori</h2>
            <ul>
                <li><select class="selectopt" name="tag_info" placeholder="Kategori">
                        @foreach ($tags as $tag)
                            <option selected value="{{ $tag->id }}">{{ $tag->name_tag }}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
        </div>
        <div class="right-side">
            <div class="top">
                <h2>Cari Artikel</h2>
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Masukkan kata kunci">
                    <button type="submit">Cari</button>
                </form>
            </div>
            <div class="content">
                <h2>Artikel Terbaru</h2>
                <div class="cards">
                    @foreach ($articles as $artikel)
                        <a href="/blogsdoc/{{ $artikel->slug_info }}">
                            <div class="card">
                                <img src="../assets/{{ $artikel->img_info }}" alt="article-image">
                                <div class="card-content">
                                    <h3>{{ $artikel->title_info }}</h3>
                                    <p>{{ $artikel->desc_info }}</p>
                                    <p class="tag">{{ $artikel->name_tag }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
