function set_option(nome){
	var nome = nome.name;
	$('#item option[value="' + nome + '"]').attr({ selected : "selected" });
}

$( document ).ready(function() {

  var raridade_arma1 = $("#ficha_raridade_arma1").val();
  if (raridade_arma1 == 'comum') {
     $("#arma1_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_arma1 == 'magico') {
     $("#arma1_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_arma1 == 'raro') {
     $("#arma1_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_arma1 == 'lendario') {
     $("#arma1_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_arma1 == 'unico') {
     $("#arma1_item").removeClass("com mag rar len uni").addClass("uni");
  }
  
  var raridade_arma2 = $("#ficha_raridade_arma2").val();
  if (raridade_arma2 == 'comum') {
     $("#arma2_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_arma2 == 'magico') {
     $("#arma2_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_arma2 == 'raro') {
     $("#arma2_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_arma2 == 'lendario') {
     $("#arma2_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_arma2 == 'unico') {
     $("#arma2_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_armadura = $("#ficha_raridade_armadura").val();
  if (raridade_armadura == 'comum') {
     $("#armadura_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_armadura == 'magico') {
     $("#armadura_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_armadura == 'raro') {
     $("#armadura_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_armadura == 'lendario') {
     $("#armadura_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_armadura == 'unico') {
     $("#armadura_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_bota = $("#ficha_raridade_bota").val();
  if (raridade_bota == 'comum') {
     $("#bota_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_bota == 'magico') {
     $("#bota_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_bota == 'raro') {
     $("#bota_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_bota == 'lendario') {
     $("#bota_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_bota == 'unico') {
     $("#bota_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_calca = $("#ficha_raridade_calca").val();
  if (raridade_calca == 'comum') {
     $("#calca_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_calca == 'magico') {
     $("#calca_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_calca == 'raro') {
     $("#calca_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_calca == 'lendario') {
     $("#calca_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_calca == 'unico') {
     $("#calca_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_capacete = $("#ficha_raridade_capacete").val();
  if (raridade_capacete == 'comum') {
     $("#capacete_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_capacete == 'magico') {
     $("#capacete_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_capacete == 'raro') {
     $("#capacete_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_capacete == 'lendario') {
     $("#capacete_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_capacete == 'unico') {
     $("#capacete_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_escudo = $("#ficha_raridade_escudo").val();
  if (raridade_escudo == 'comum') {
     $("#escudo_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_escudo == 'magico') {
     $("#escudo_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_escudo == 'raro') {
     $("#escudo_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_escudo == 'lendario') {
     $("#escudo_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_escudo == 'unico') {
     $("#escudo_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_luva = $("#ficha_raridade_luva").val();
  if (raridade_luva == 'comum') {
     $("#luva_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_luva == 'magico') {
     $("#luva_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_luva == 'raro') {
     $("#luva_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_luva == 'lendario') {
     $("#luva_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_luva == 'unico') {
     $("#luva_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_ombreira = $("#ficha_raridade_ombreira").val();
  if (raridade_ombreira == 'comum') {
     $("#ombreira_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_ombreira == 'magico') {
     $("#ombreira_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_ombreira == 'raro') {
     $("#ombreira_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_ombreira == 'lendario') {
     $("#ombreira_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_ombreira == 'unico') {
     $("#ombreira_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_anel1 = $("#ficha_raridade_anel1").val();
  if (raridade_anel1 == 'comum') {
     $("#anel1_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_anel1 == 'magico') {
     $("#anel1_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_anel1 == 'raro') {
     $("#anel1_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_anel1 == 'lendario') {
     $("#anel1_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_anel1 == 'unico') {
     $("#anel1_item").removeClass("com mag rar len uni").addClass("uni");
  }

  var raridade_anel2 = $("#ficha_raridade_anel2").val();
  if (raridade_anel2 == 'comum') {
     $("#anel2_item").removeClass("com mag rar len uni").addClass("com");
  } else if (raridade_anel2 == 'magico') {
     $("#anel2_item").removeClass("com mag rar len uni").addClass("mag");
  } else if (raridade_anel2 == 'raro') {
     $("#anel2_item").removeClass("com mag rar len uni").addClass("rar");
  } else if (raridade_anel2 == 'lendario') {
     $("#anel2_item").removeClass("com mag rar len uni").addClass("len");
  } else if (raridade_anel2 == 'unico') {
     $("#anel2_item").removeClass("com mag rar len uni").addClass("uni");
  }


  $("#ficha_raridade_arma1").change(function() {
    var raridade = $("#ficha_raridade_arma1").val();
    if (raridade == 'comum') {
       $("#arma1_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade == 'magico') {
       $("#arma1_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade == 'raro') {
       $("#arma1_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade == 'lendario') {
       $("#arma1_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade == 'unico') {
       $("#arma1_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_arma2").change(function() {
    var raridade_arma2 = $("#ficha_raridade_arma2").val();
    if (raridade_arma2 == 'comum') {
       $("#arma2_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_arma2 == 'magico') {
       $("#arma2_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_arma2 == 'raro') {
       $("#arma2_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_arma2 == 'lendario') {
       $("#arma2_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_arma2 == 'unico') {
       $("#arma2_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_armadura").change(function() {
    var raridade_armadura = $("#ficha_raridade_armadura").val();
    if (raridade_armadura == 'comum') {
       $("#armadura_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_armadura == 'magico') {
       $("#armadura_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_armadura == 'raro') {
       $("#armadura_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_armadura == 'lendario') {
       $("#armadura_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_armadura == 'unico') {
       $("#armadura_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_bota").change(function() {
    var raridade_bota = $("#ficha_raridade_bota").val();
    if (raridade_bota == 'comum') {
       $("#bota_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_bota == 'magico') {
       $("#bota_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_bota == 'raro') {
       $("#bota_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_bota == 'lendario') {
       $("#bota_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_bota == 'unico') {
       $("#bota_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_calca").change(function() {
    var raridade_calca = $("#ficha_raridade_calca").val();
    if (raridade_calca == 'comum') {
       $("#calca_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_calca == 'magico') {
       $("#calca_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_calca == 'raro') {
       $("#calca_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_calca == 'lendario') {
       $("#calca_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_calca == 'unico') {
       $("#calca_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_capacete").change(function() {
  var raridade_capacete = $("#ficha_raridade_capacete").val();
    if (raridade_capacete == 'comum') {
       $("#capacete_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_capacete == 'magico') {
       $("#capacete_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_capacete == 'raro') {
       $("#capacete_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_capacete == 'lendario') {
       $("#capacete_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_capacete == 'unico') {
       $("#capacete_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_escudo").change(function() {
    var raridade_escudo = $("#ficha_raridade_escudo").val();
    if (raridade_escudo == 'comum') {
       $("#escudo_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_escudo == 'magico') {
       $("#escudo_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_escudo == 'raro') {
       $("#escudo_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_escudo == 'lendario') {
       $("#escudo_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_escudo == 'unico') {
       $("#escudo_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_luva").change(function() {
    var raridade_luva = $("#ficha_raridade_luva").val();
    if (raridade_luva == 'comum') {
       $("#luva_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_luva == 'magico') {
       $("#luva_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_luva == 'raro') {
       $("#luva_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_luva == 'lendario') {
       $("#luva_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_luva == 'unico') {
       $("#luva_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_ombreira").change(function() {
    var raridade_ombreira = $("#ficha_raridade_ombreira").val();
    if (raridade_ombreira == 'comum') {
       $("#ombreira_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_ombreira == 'magico') {
       $("#ombreira_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_ombreira == 'raro') {
       $("#ombreira_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_ombreira == 'lendario') {
       $("#ombreira_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_ombreira == 'unico') {
       $("#ombreira_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_anel1").change(function() {
    var raridade_anel1 = $("#ficha_raridade_anel1").val();
    if (raridade_anel1 == 'comum') {
       $("#anel1_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_anel1 == 'magico') {
       $("#anel1_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_anel1 == 'raro') {
       $("#anel1_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_anel1 == 'lendario') {
       $("#anel1_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_anel1 == 'unico') {
       $("#anel1_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_raridade_anel2").change(function() {
    var raridade_anel2 = $("#ficha_raridade_anel2").val();
    if (raridade_anel2 == 'comum') {
       $("#anel2_item").removeClass("com mag rar len uni").addClass("com");
    } else if (raridade_anel2 == 'magico') {
       $("#anel2_item").removeClass("com mag rar len uni").addClass("mag");
    } else if (raridade_anel2 == 'raro') {
       $("#anel2_item").removeClass("com mag rar len uni").addClass("rar");
    } else if (raridade_anel2 == 'lendario') {
       $("#anel2_item").removeClass("com mag rar len uni").addClass("len");
    } else if (raridade_anel2 == 'unico') {
       $("#anel2_item").removeClass("com mag rar len uni").addClass("uni");
    }
  });

  $("#ficha_tipo_arma1").change(function() {
    var tipo = $("#ficha_tipo_arma1").val();
    if (tipo == 'duas') {
      $("#ficha_arma2_nome").prop('disabled',true);
      $("#ficha_arma2_lv").prop('disabled',true);
      $("#ficha_raridade_arma2").prop('disabled',true);
      $("#ficha_tipo_arma2").prop('disabled',true);
      $("#ficha_bonus_arma2").prop('disabled',true);
      $("#ficha_preco_compra_arma2").prop('disabled',true);
      $("#ficha_preco_venda_arma2").prop('disabled',true);
      $("#ficha_encaixes_arma2").prop('disabled',true);
      $("#ficha_pedras_encaixadas_arma2").prop('disabled',true);
    } else {
      $("#ficha_arma2_nome").prop('disabled',false);
      $("#ficha_arma2_lv").prop('disabled',false);
      $("#ficha_raridade_arma2").prop('disabled',false);
      $("#ficha_tipo_arma2").prop('disabled',false);
      $("#ficha_bonus_arma2").prop('disabled',false);
      $("#ficha_preco_compra_arma2").prop('disabled',false);
      $("#ficha_preco_venda_arma2").prop('disabled',false);
      $("#ficha_encaixes_arma2").prop('disabled',false);
      $("#ficha_pedras_encaixadas_arma2").prop('disabled',false);
    }
  });

  $("#ficha_dano_base, #ficha_bonus_arma1, #ficha_bonus_arma2, #ficha_bonus_dano_anel1, #ficha_bonus_dano_anel2, #bonus_fixo_ficha_dano").change(function() {
    var bonus_dano = $("#bonus_fixo_ficha_dano").val();
    var dano_arma1 = $("#ficha_bonus_arma1").val();
    var dano_arma2 = $("#ficha_bonus_arma2").val();
    var anel_dano1 = $("#ficha_bonus_dano_anel1").val();
    var anel_dano2 = $("#ficha_bonus_dano_anel2").val();
    var dano_base = $("#ficha_dano_base").val();
    var total = parseInt(dano_arma1)+parseInt(dano_arma2)+parseInt(anel_dano1)+parseInt(anel_dano2)+parseInt(dano_base)+parseInt(bonus_dano);
    $("#ficha_dano").val(total);
  });

  $("#ficha_defesa_base, #ficha_bonus_armadura, #ficha_bonus_bota, #ficha_bonus_calca, #ficha_bonus_capacete, #ficha_bonus_escudo, #ficha_bonus_luva, #ficha_bonus_ombreira, #ficha_bonus_def_anel1, #ficha_bonus_def_anel2, #bonus_fixo_ficha_defesa").change(function() {
    var bonus_def = $("#bonus_fixo_ficha_defesa").val();
    var armadura = $("#ficha_bonus_armadura").val();
    var bota = $("#ficha_bonus_bota").val();
    var calca = $("#ficha_bonus_calca").val();
    var capacete = $("#ficha_bonus_capacete").val();
    var escudo = $("#ficha_bonus_escudo").val();
    var luva = $("#ficha_bonus_luva").val();
    var ombreira = $("#ficha_bonus_ombreira").val();
    var anel_def1 = $("#ficha_bonus_def_anel1").val();
    var anel_def2 = $("#ficha_bonus_def_anel2").val();
    var defesa_base = $("#ficha_defesa_base").val();
    var total = parseInt(defesa_base)+parseInt(armadura)+parseInt(bota)+parseInt(calca)+parseInt(capacete)+parseInt(escudo)+parseInt(luva)+parseInt(ombreira)+parseInt(anel_def1)+parseInt(anel_def2)+parseInt(bonus_def);
    $("#ficha_defesa").val(total);
  });

  $("#ficha_vida_base, #ficha_bonus_vida_anel1, #ficha_bonus_vida_anel2, #bonus_fixo_ficha_vida").change(function() {
    var bonus_vida = $("#bonus_fixo_ficha_vida").val();
    var anel_vida1 = $("#ficha_bonus_vida_anel1").val();
    var anel_vida2 = $("#ficha_bonus_vida_anel2").val();
    var vida_base = $("#ficha_vida_base").val();
    var total = parseInt(vida_base)+parseInt(anel_vida1)+parseInt(anel_vida2)+parseInt(bonus_vida);
    console.log(total);
    $("#ficha_vida").val(total);
    
  });

  $("#ficha_mana_base, #ficha_bonus_mana_anel1, #ficha_bonus_mana_anel2, #bonus_fixo_ficha_mana").change(function() {
    var bonus_mana = $("#bonus_fixo_ficha_mana").val();
    var anel_mana1 = $("#ficha_bonus_mana_anel1").val();
    var anel_mana2 = $("#ficha_bonus_mana_anel2").val();
    var mana_base  = $("#ficha_mana_base").val();
    var total = parseInt(mana_base)+parseInt(anel_mana1)+parseInt(anel_mana2)+parseInt(bonus_mana);
    $("#ficha_mana").val(total);
  });

  $("#ficha_critico_nat_base").change(function() {
    var critico_nat = $("#ficha_critico_nat_base").val();
    $("#ficha_critico_nat").val(critico_nat+'%');
  });

  $("#ficha_critico_indz_base").change(function() {
    var critico_indz = $("#ficha_critico_indz_base").val();
    $("#ficha_critico_indz").val(critico_indz+'%');
  });
  
  $("#porcentagem_ficha_vida").focusout(function() {
    var porcentagem_ficha_vida = $("#porcentagem_ficha_vida").val();
    var bonus_vida = $("#bonus_fixo_ficha_vida").val();
    var anel_vida1 = $("#ficha_bonus_vida_anel1").val();
    var anel_vida2 = $("#ficha_bonus_vida_anel2").val();
    var vida_base = $("#ficha_vida_base").val();
    var porcentagem_bonus = porcentagem_ficha_vida/100;
    var vida_total = parseInt(vida_base)+parseInt(anel_vida1)+parseInt(anel_vida2)+parseInt(bonus_vida);
    var bonus_total = vida_total * porcentagem_bonus;
    
    $("#ficha_vida").val(bonus_total+vida_total);
  });

  $("#porcentagem_ficha_defesa").focusout(function() {
    var porcentagem_ficha_defesa = $("#porcentagem_ficha_defesa").val();
    var bonus_def = $("#bonus_fixo_ficha_defesa").val();
    var armadura = $("#ficha_bonus_armadura").val();
    var bota = $("#ficha_bonus_bota").val();
    var calca = $("#ficha_bonus_calca").val();
    var capacete = $("#ficha_bonus_capacete").val();
    var escudo = $("#ficha_bonus_escudo").val();
    var luva = $("#ficha_bonus_luva").val();
    var ombreira = $("#ficha_bonus_ombreira").val();
    var anel_def1 = $("#ficha_bonus_def_anel1").val();
    var anel_def2 = $("#ficha_bonus_def_anel2").val();
    var defesa_base = $("#ficha_defesa_base").val();

    var porcentagem_bonus = porcentagem_ficha_defesa/100;
    var defesa_total = parseInt(defesa_base)+parseInt(armadura)+parseInt(bota)+parseInt(calca)+parseInt(capacete)+parseInt(escudo)+parseInt(luva)+
    parseInt(ombreira)+parseInt(anel_def1)+parseInt(anel_def2)+parseInt(bonus_def);
    var bonus_total = defesa_total * porcentagem_bonus;
    
    $("#ficha_defesa").val(bonus_total+defesa_total);
  });

  $("#porcentagem_ficha_mana").focusout(function() {
    var porcentagem_ficha_mana = $("#porcentagem_ficha_mana").val();
    var bonus_mana = $("#bonus_fixo_ficha_mana").val();
    var anel_mana1 = $("#ficha_bonus_mana_anel1").val();
    var anel_mana2 = $("#ficha_bonus_mana_anel2").val();
    var mana_base = $("#ficha_mana_base").val();

    var porcentagem_bonus = porcentagem_ficha_mana/100;
    var mana_total = parseInt(mana_base)+parseInt(anel_mana1)+parseInt(anel_mana2)+parseInt(bonus_mana);
    bonus_total = mana_total * porcentagem_bonus;
    $("#ficha_mana").val(bonus_total+mana_total);
  });

   $("#porcentagem_ficha_dano").focusout(function() {
    var porcentagem_ficha_dano = $("#porcentagem_ficha_dano").val();
    
    var bonus_dano = $("#bonus_fixo_ficha_dano").val();
    var dano_arma1 = $("#ficha_bonus_arma1").val();
    var dano_arma2 = $("#ficha_bonus_arma2").val();
    var anel_dano1 = $("#ficha_bonus_dano_anel1").val();
    var anel_dano2 = $("#ficha_bonus_dano_anel2").val();
    var dano_base = $("#ficha_dano_base").val();

    var porcentagem_bonus = porcentagem_ficha_dano/100;
    var dano_total = parseInt(dano_arma1)+parseInt(dano_arma2)+parseInt(anel_dano1)+parseInt(anel_dano2)+parseInt(dano_base)+parseInt(bonus_dano);
    bonus_total = dano_total * porcentagem_bonus;
    $("#ficha_dano").val(bonus_total+dano_total);
  });

   // mostrar exibir elementos do iventario
  $("#hide_hist").click(function() {
    $("#ficha_historia").hide();
  });

  $("#show_hist").click(function() {
    $("#ficha_historia").show();
  });


  $("#ficha_pedras_encaixadas_arma1").change(function() {
      var indice = 0;

      $("#arma1_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_arma1" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma1_pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_arma1_pedras" name="arma1_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_arma1_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_arma1_pedras_lv" type="text" name="arma1_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma1_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma1_pedras_preco_compra" type="text" name="arma1_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma1_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma1_pedras_preco_venda" type="text" name="arma1_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_arma1_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma1_pedras_hablidades" type="text" name="arma1_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#arma1_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_arma2").change(function() {
      var indice = 0;

      $("#arma2_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_arma2" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma2_pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_arma2_pedras" name="arma2_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_arma2_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_arma2_pedras_lv" type="text" name="arma2_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma2_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma2_pedras_preco_compra" type="text" name="arma2_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_arma2_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma2_pedras_preco_venda" type="text" name="arma2_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_arma2_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_arma2_pedras_hablidades" type="text" name="arma2_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#arma2_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_armadura").change(function() {
      var indice = 0;

      $("#armadura_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_armadura" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaarmadurapedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_armadura_pedras" name="armadura_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_armadura_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_armadura_pedras_lv" type="text" name="armadura_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_armadura_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_armadura_pedras_preco_compra" type="text" name="armadura_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_armadura_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_armadura_pedras_preco_venda" type="text" name="armadura_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_armadura_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_armadura_pedras_hablidades" type="text" name="armadura_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#armadura_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_bota").change(function() {
      var indice = 0;

      $("#bota_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_bota" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="ficha_bota_pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_bota_pedras" name="bota_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_bota_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_bota_pedras_lv" type="text" name="bota_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_bota_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_bota_pedras_preco_compra" type="text" name="bota_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_bota_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_bota_pedras_preco_venda" type="text" name="bota_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_bota_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_bota_pedras_hablidades" type="text" name="bota_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#bota_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_calca").change(function() {
      var indice = 0;

      $("#calca_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_calca" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="ficha_calca_pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_calca_pedras" name="bota_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_calca_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_calca_pedras_lv" type="text" name="bota_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_calca_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_calca_pedras_preco_compra" type="text" name="bota_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_calca_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_calca_pedras_preco_venda" type="text" name="bota_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_calca_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_calca_pedras_hablidades" type="text" name="bota_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#calca_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_capacete").change(function() {
      var indice = 0;

      $("#capacete_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_capacete" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="ficha_capacete_pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_capacete_pedras" name="capacete_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_capacete_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_capacete_pedras_lv" type="text" name="capacete_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_capacete_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_capacete_pedras_preco_compra" type="text" name="capacete_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_capacete_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_capacete_pedras_preco_venda" type="text" name="capacete_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_capacete_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_capacete_pedras_hablidades" type="text" name="capacete_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#capacete_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_escudo").change(function() {
      var indice = 0;

      $("#escudo_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_escudo" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaescudopedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_escudo_pedras" name="escudo_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_escudo_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_escudo_pedras_lv" type="text" name="escudo_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_escudo_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_escudo_pedras_preco_compra" type="text" name="escudo_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_escudo_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_escudo_pedras_preco_venda" type="text" name="escudo_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_escudo_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_escudo_pedras_hablidades" type="text" name="escudo_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#escudo_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_luva").change(function() {
      var indice = 0;

      $("#luva_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_luva" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaluvapedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_luva_pedras" name="luva_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_luva_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_luva_pedras_lv" type="text" name="luva_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_luva_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_luva_pedras_preco_compra" type="text" name="luva_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_luva_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_luva_pedras_preco_venda" type="text" name="luva_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_luva_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_luva_pedras_hablidades" type="text" name="luva_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#luva_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_ombreira").change(function() {
      var indice = 0;

      $("#ombreira_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_ombreira" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaombreirapedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_ombreira_pedras" name="ombreira_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_ombreira_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_ombreira_pedras_lv" type="text" name="ombreira_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_ombreira_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_ombreira_pedras_preco_compra" type="text" name="ombreira_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_ombreira_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_ombreira_pedras_preco_venda" type="text" name="ombreira_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_ombreira_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_ombreira_pedras_hablidades" type="text" name="ombreira_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#ombreira_pedras").append(pedra);
      }
  });


  $("#ficha_pedras_encaixadas_anel1").change(function() {
      var indice = 0;

      $("#anel1_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_anel1" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaanel1pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_anel1_pedras" name="anel1_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_anel1_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_anel1_pedras_lv" type="text" name="anel1_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_anel1_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel1_pedras_preco_compra" type="text" name="anel1_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_anel1_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel1_pedras_preco_venda" type="text" name="anel1_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_anel1_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel1_pedras_hablidades" type="text" name="anel1_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#anel1_pedras").append(pedra);
      }
  });

  $("#ficha_pedras_encaixadas_anel2").change(function() {
      var indice = 0;

      $("#anel2_pedras").empty();
      quantidade = $( "#ficha_pedras_encaixadas_anel2" ).val();
      for (var i = 0; i < quantidade; i++) {
        var pedra = 
              '<div class="row">' +
                '<div class="col-md-2">' +
                  '<label for="fichaanel2pedras">Pedra:</label>' +
                  '<select class="form-control input-sm" id="ficha_anel2_pedras" name="anel2_pedras[pedra'+i+'][nome]">' +
                    '<option value="nenhuma">Nenhuma</option>' +
                    '<option value="rubi">Rubi</option>' +
                    '<option value="esmeralda">Esmeralda</option>' +
                    '<option value="safira">Safira</option>' +
                    '<option value="topazio">Tópázio</option>' +
                    '<option value="ametista">Ametista</option>' +
                    '<option value="diamante">Diamante</option>' +
                    '<option value="opala">Opala</option>' +
                  '</select>' +
                '</div>' +
                '<div class="col-md-1">' +
                  '<label for="ficha_anel2_pedras_lv">Lv</label>' +
                  '<input class="form-control input-sm" maxlength="2" value="" id="ficha_anel2_pedras_lv" type="text" name="anel2_pedras[pedra'+i+'][lv]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_anel2_pedras_preco_compra">Compra</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel2_pedras_preco_compra" type="text" name="anel2_pedras[pedra'+i+'][compra]">' +
                '</div>' +
                '<div class="col-md-2">' +
                  '<label for="ficha_anel2_pedras_preco_venda">Venda</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel2_pedras_preco_venda" type="text" name="anel2_pedras[pedra'+i+'][venda]">' +
                '</div>' +
                '<div class="col-md-5">' +
                  '<label for="ficha_anel2_pedras_hablidades">Habilidades</label>' +
                  '<input class="form-control input-sm" value="" id="ficha_anel2_pedras_hablidades" type="text" name="anel2_pedras[pedra'+i+'][habilidades]">' +
                '</div>' +
              '</div>';

        $("#anel2_pedras").append(pedra);
      }
  });

});