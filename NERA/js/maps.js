let map;
let marker;

// Cidades com coordenadas
const cidades = {
    DI: { lat: -23.6865, lng: -46.6234 },  // Diadema
    MA: { lat: -23.6677, lng: -46.4613 },  // Mauá
    RP: { lat: -23.7060, lng: -46.4060 },  // Ribeirão Pires
    RG: { lat: -23.7430, lng: -46.3975 },  // Rio Grande da Serra
    SA: { lat: -23.6639, lng: -46.5383 },  // Santo André
    SB: { lat: -23.6921, lng: -46.5651 },  // São Bernardo do Campo
    SC: { lat: -23.6229, lng: -46.5548 }   // São Caetano do Sul
};

// Pontos de coleta por cidade
const pontos = {
    DI: [
        { nome: "Ecoponto Arco-Íris", lat: -23.7005, lng: -46.6200 },
        { nome: "Ecoponto Arraia", lat: -23.6900, lng: -46.6300 },
        { nome: "Ecoponto Júpiter", lat: -23.6800, lng: -46.6400 }
    ],
    RP: [
        { nome: "Paço Municipal", lat: -23.7060, lng: -46.4060 },
        { nome: "Posto Ipiranga", lat: -23.7100, lng: -46.4100 }
    ],
    SA: [
        { nome: "Estação de Coleta Centro", lat: -23.6639, lng: -46.5383 },
        { nome: "Estação de Coleta Utinga", lat: -23.6500, lng: -46.5200 }
    ],
    SB: [
        { nome: "Ecoponto Paulicéia", lat: -23.6921, lng: -46.5651 },
        { nome: "Ecoponto Baeta Neves", lat: -23.7000, lng: -46.5700 }
    ],
    SC: [
        { nome: "Ecoponto Fundação", lat: -23.6229, lng: -46.5548 }
    ],
    MA: [
        { nome: "Ecoponto Zaíra", lat: -23.6677, lng: -46.4613 }
    ],
    RG: [
        { nome: "Ponto Central Rio Grande", lat: -23.7430, lng: -46.3975 }
    ]
};

// Inicializa mapa em São Paulo
function initMap() {
    const mapOptions = {
        center: { lat: -23.550520, lng: -46.633308 },
        zoom: 11
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

// Ao mudar a cidade → centralizar mapa e atualizar pontos no select
function buscarCidade() {
    const cidade = document.getElementById("cidade").value;
    const locationSelect = document.querySelector("select[name='location']");

    // Centraliza no centro da cidade
    if (cidades[cidade]) {
        map.setCenter(cidades[cidade]);
        map.setZoom(12);

        // Remove marcador anterior (se houver)
        if (marker) {
            marker.setMap(null);
        }
    }

    // Limpa opções anteriores
    locationSelect.innerHTML = '<option disabled selected>Localização de pontos</option>';

    // Preenche o select com os pontos da cidade
    if (pontos[cidade]) {
        pontos[cidade].forEach((p, index) => {
            const option = document.createElement("option");
            option.value = index;
            option.textContent = p.nome;
            locationSelect.appendChild(option);
        });
    }
}

// Ao selecionar ponto → mostrar marcador
function selecionarPonto() {
    const cidade = document.getElementById("cidade").value;
    const locationSelect = document.querySelector("select[name='location']");
    const index = locationSelect.value;

    if (pontos[cidade] && pontos[cidade][index]) {
        const ponto = pontos[cidade][index];

        // Centraliza no ponto
        map.setCenter({ lat: ponto.lat, lng: ponto.lng });
        map.setZoom(15);

        // Remove marcador anterior
        if (marker) {
            marker.setMap(null);
        }

        // Cria marcador
        marker = new google.maps.Marker({
            position: { lat: ponto.lat, lng: ponto.lng },
            map: map,
            title: ponto.nome
        });
    }
}

// Listener para quando mudar o select de localização
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("select[name='location']").addEventListener("change", selecionarPonto);
});
