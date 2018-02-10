<?php
//Wordpress Security function
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//Register the settings
 function mastodon_settings_init() {
        // register the settings values to wordpress
            register_setting('mastodon', 'mastodon_instance_url');
            register_setting('mastodon', 'mastodon_post_visibility');
            register_setting('mastodon', 'mastodon_post_format');
            register_setting('mastodon', 'mastodon_post_on_update');
            register_setting('mastodon', 'mastodon_post_hashtags');
     
        // register a new section in the "gnusocial-settings-page" page
            add_settings_section(
                'mastodon_help_func',
                '',
                'mastodon_help_func',
                'mastodon-settings-page'
            );

        // register a new section in the "mastodon-settings-page" page
            add_settings_section(
                'mastodon_server_settings_server_section',
                esc_attr__('Server Settings', 'autopost-to-mastodon'),
                'mastodon_server_settings_description_func',
                'mastodon-settings-page'
            );
     
                // register a new field SERVER URL
                    add_settings_field(
                        'mastodon_server_url_field',
                        '1. '.esc_attr__('Authentication', 'autopost-to-mastodon'),
                        'mastodon_server_url_func',
                        'mastodon-settings-page',
                        'mastodon_server_settings_server_section'
                    );
             
             
                // register a new field email
                    add_settings_field(
                        'mastodon_email_field',
                        '2. '.esc_attr__('Test', 'autopost-to-mastodon'),
                        'mastodon_user_auth_func',
                        'mastodon-settings-page',
                        'mastodon_server_settings_server_section'
                    );
             

        // register a new section in the "mastodon-settings-page" page
            add_settings_section(
                'mastodon_post_section',
                esc_attr__('Configure the Post', 'autopost-to-mastodon'),
                'mastodon_post_description_func',
                'mastodon-settings-page'
            );
     
                // register a new field SERVER URL
                    add_settings_field(
                        'mastodon_post_hashtags',
                        esc_attr__('Global Post Hashtags', 'autopost-to-mastodon'),
                        'mastodon_post_hashtags',
                        'mastodon-settings-page',
                        'mastodon_post_section'
                    );
                // register a new field SERVER URL
                    add_settings_field(
                        'mastodon_post_visibility',
                        esc_attr__('Toot Visibility', 'autopost-to-mastodon'),
                        'mastodon_post_visibility',
                        'mastodon-settings-page',
                        'mastodon_post_section'
                    );
                // register a new field SERVER URL
                    add_settings_field(
                        'mastodon_post_format',
                        esc_attr__('Toot Format', 'autopost-to-mastodon'),
                        'mastodon_post_format',
                        'mastodon-settings-page',
                        'mastodon_post_section'
                    );

        // register a new section in the "mastodon-settings-page" page
            add_settings_section(
                'mastodon_behavior_section',
                esc_attr__('Configure the Plugin Behavior', 'autopost-to-mastodon'),
                'mastodon_behavior_description_func',
                'mastodon-settings-page'
            );
     
                // register a new field SERVER URL
                    add_settings_field(
                        'mastodon_post_on_update_field',
                        esc_attr__('Also toot on Post Update', 'autopost-to-mastodon'),
                        'mastodon_post_on_update_func',
                        'mastodon-settings-page',
                        'mastodon_behavior_section'
                    );
    }
 
/**
 * Donate
 */
 
    function mastodon_help_func()
    {
        ?>
        <div style="border:2px dashed #000; padding: 1%;">
        <h2><?php esc_html_e('Do you like Mastodon Autopost?','autopost-to-mastodon');?></h2>

       <h4><?php esc_html_e('Yes','autopost-to-mastodon');?>!</h4>
       * <b><?php esc_html_e('Please rate the plugin','autopost-to-mastodon');?>!</b> <?php esc_html_e("For getting the word out, it's important to have good reviews",'autopost-to-mastodon');?>: <a href="https://wordpress.org/plugins/autopost-to-mastodon/" target="_blank"><?php esc_html_e('Rate on Wordpress.org','autopost-to-mastodon');?></a><br>
       * <?php esc_html_e('Consider participating.(e.g. With translating it into another language)','autopost-to-mastodon');?>: <a href="https://github.com/L1am0/mastodon_wordpress_autopost" target="_blank"><?php esc_html_e('Mastodon Autopost is on Github','autopost-to-mastodon');?></a><br>
       * <?php esc_html_e('Want to thank in another way?','autopost-to-mastodon');?>: <a href="http://l1am0.eu/donate.php?p=map" target="_blank"><?php esc_html_e('Buy me a Mate','autopost-to-mastodon');?></a>
       <h4><?php esc_html_e('No','autopost-to-mastodon');?></h4>
       * <?php esc_html_e('Please give me feedback how your experience could be improved','autopost-to-mastodon');?>: <a href="mailto:mastodonautopost@l1am0.eu">mastodonautopost@l1am0.eu</a>
        </div>
        <?php
    }


 
/**
 * Server Settings 
 */
 
// Section Title
    function mastodon_server_settings_description_func()
    {
        esc_html_e('Please provide the account details for the server.', 'autopost-to-mastodon');
    }
 
// Server URL
    function mastodon_server_url_func()
    {
        //Autocomplete instances
        $mInstancesArray = ["mastodon.xyz","awoo.space","social.tchncs.de","animalliberation.social","socially.constructed.space","icosahedron.website","hostux.social","social.diskseven.com","social.gestaltzerfall.net","social.imirhil.fr","sdfn-01.ninjawedding.org","aleph.land","masto.themimitoof.fr","social.ballpointcarrot.net","manowar.social","share.elouworld.org","7nw.eu","maly.io","mastodon.gougere.fr","social.alex73630.xyz","social.lkw.tf","social.wxcafe.net","oc.todon.fr","hex.bz","social.apreslanu.it","social.tcit.fr","fern.surgeplay.com","octodon.social","witches.town","pouet.yolops.net","social.nasqueron.org","mastodon.hasameli.com","mastodon.lertsenem.com","mastodon.club","anticapitalist.party","social.atypique.net","rafting.io","social.snargol.com","mastodon.cloud","masto.raildecake.fr","pouet.it","rich.gop","adney.land","mstdn.io","botsin.space","m.sl-network.fr","mastodon.top","toot.cafe","mastodon.partipirate.org","status.dissidence.ovh","social.nervestaple.com","mastodon.tetaneutral.net","social.jdiez.me","social.glados.ch","schuppentier.org","mastodon.rocks","mastodon.technology","mastodon.cc","social.targaryen.house","hitb-masto.herokuapp.com","securitymastod.one","cybre.space","toot.cat","mastodon.opportunis.me","from.komic.eu","techn.ical.ist","unixcorn.xyz","cmpwn.com","niu.moe","bibeogaem.zone","mastodon.roflcopter.fr","mastodon.peshane.net","mastodon.elao.com","im-in.space","social.taker.fr","dancingbanana.party","mstdn.fr","oreka.online","toot-lab.reclaim.technology","occitanie.social","masto.io","tootplanet.space","mastodon.at","slime.global","igouv.fr","mastodon.land","mastodon.dremtech.fr","boitam.eu","ecurie.social","social.troll.academy","mastodon.blue","social.d0p1.eu","social.lasanha.org","meow.social","tiny.tilde.website","tusk.social","tali.t0k.org","mastodon.kujiu.org","social.homunyan.com","social.numerama.com","mastodon.tedomum.net","mastodon.rainbownerds.de","social.etc-services.de","mastodon.patallan.com.au","mamot.fr","mastodon.zaclys.com","mastodon.open.legal","social.imchip.be","mastodon.kawaiyume.net","mastodonfrance.com","mastodon.me.uk","fierce-reef-65367.herokuapp.com","antisocial.narinimous.fr","masto.quad.moe","manx.social","social.infranix.eu","mastadon.tescher.me","mastodon.mpy.ovh","cmu.party","infosec.exchange","mastodon.cgx.me","social.adlerweb.info","fo0bar.org","masto.dog","mastodon.indie.host","mastodon.host","ca-os.com","darksocial.party","bookwitty.social","mastodon.chaosfield.at","toot.gibberfish.org","myriad.social","webcommunity.club","freeradical.zone","tinnies.club","social.depertat.net","kosmos.social","tooting.intensifi.es","mastoton.fi","mastodon.fun","mastodon.hackerlab.fr","social.weho.st","metal.odon.space","anti.energy","mastodon.pe","tescher.me","mamout.xyz","shelter.moe","social.nah.re","oulipo.social","queer.party","a.weirder.earth","brrrt.eu","mastodon.codingfield.com","mastodon.qowala.org","ika.moe","masto.pt","vulpine.club","mst3k.interlinked.me","toot.berlin","mastodon.migennes.net","social.mastodon.com.au","mastodon.not-enough.space","oldbytes.space","social.svallee.fr","freehold.earth","toot.aquilenet.fr","masto.svnet.fr","mastodon.zombocloud.com","mastodon.weaponvsac.space","scifi.fyi","capitalism.party","myfreckle.com","mastodon.sandwich.net","mastodon.thegraveyard.org","nodotsam.xyz","status.pointless.one","eunivers.social","soc.ialis.me","loutre.info","pouet.meutel.net","mastodon.cemea.org","diaspodon.fr","masto.fdlibre.eu","functional.cafe","mastodon.pirateparty.be","mastodon.hk","ostatus.renken.is","bapp.me","party.personal.pizza","bne.social","social.noostache.fr","m.g3l.org","social.devloprog.org","pouets.ovh","miaou.drycat.fr","mastodon.org.uk","tooot.im","geeks.one","social.nassi.me","apoil.org","mastodon.ar.al","noagendasocial.com","cafe.des-blogueurs.org","social.csswg.org","atomicfridge.net","mastodon.cusae.com","glitch.social","mastodon.co.nz","mastodon.jamesmwright.com","simstim.club","masto.ninja","mastodon.transneptune.net","framapiaf.org","mastodon.lu","spanner.works","mstdn.nl","resistodon.com","bloodandthunderleviathan.herokuapp.com","mastodon.acc.umu.se","mastodon.triofan.com","sys.kawi.fr","trunk.mad-scientist.club","nsfw.finance","teamtk.eu","mastodon.yoyo.org","mstdn.maud.io","wogan.im","mastodon.scuttle.org","betterletter.io","pdx.social","friloux.me","un.lobi.to","h.kher.nl","yso.pet","social.sitedethib.com","mammouth.cafe","pachyder.me","mastodon.eliotberriot.com","social.devio.us","mastodon.hugopoi.net","s.maximeborg.es","toot.tzim.net","mastodon.le-palantir.com","mastodon.unfollow.today","x0r.be","mastodon.yokohama","mastodon.lachman.tk","mastodon.9net.org","m.gandi.social","chabant.social","mammut.space","scotland.computer","snabeltann.no","chitter.xyz","cn.tootist.net","mstdn.jp","mastodon.papey.fr","mastodon.technosorcery.net","toot.lmorchard.com","social.rbs.io","mastodon.nzoss.nz","social.logilab.org","mastodon.scot","mastodon.juggler.jp","pouet.panglossoft.fr","mastodon.groningendigitalcity.com","bonn.social","toot.love","sns.gdgd.jp.net","toot.memtech.website","computerfairi.es","kirakiratter.com","nrd.li","mastodon.un-zero-un.net","mstdn.club","m6n.jp","wellness.so","mstdn.social","kyoto-citygrid.org","mastodon.jtwp470.net","toot.yukimochi.jp","mastodon.sakaki333.com","g0v.social","myles.life","chaos.social","corrigan.moe","mstdn.poyo.me","mastodon.u4u.org","mastodonti.co","mastodon.zeguigui.com","tablegame.mstdn.cloud","lovelive-anime.tk","mstdn.barippi.com","oransns.com","dolphin.town","mstdn.blue","socialgame.mstdn.cloud","hojiro.herokuapp.com","mastodon.eastback.co.jp","m6n.onsen.tech","m.sighash.info","comm.cx","delusion.ariela.jp","pawoo.net","mstdn.cc","pao.moe","mstdn-workers.com","mastodon.2502.net","mstdn.kemono-friends.info","reseau.education","mstdn.neigepluie.net","mstdn.otofu.xyz","www.mstddntfdn.online","interfesse.net","mstdn.cf","ekimemo.info","mstdn.taiha.net","yoshis.woolly.world","social.katarpilar.com","mastodon.motcha.tech","otoya.space","inari.opencocon.org","md.ggtea.org","m4570.xyz","cksv.jp","frootmig.net","mastodon.minicube.net","tenforward.social","pleasehug.me","wsup.social","don.tacostea.net","mstdn.syui.cf","niwatoriman.me","mastodon.art","mstdn.mobilehackerz.jp","mustardon.tokyo","mstdn.omaera.org","mastodon.maromaro.co.jp","mstdn.onosendai.jp","faux.io","mastodon.sylphid.jp","gbtdn.tokyo","kero.ccsakura.jp","mast.moe","social.java.nrw","social.myconan.net","such.social","mstdn.misosi.ru","mastd.me","mstdn.firstforest.jp","mstdn.anontown.com","mastodon-omoshiro.com","mstdn.neriko.net","mastodon.huma-num.fr","imastodon.net","m.u7fa9.org","mast.tokyo","mastodon.zenfolie.org","mastodon.dereferenced.org","now.kibousoft.co.jp","mstdn.yuyat.jp","ephemeral.glitch.social","toot.kashishokunin.com","mstdn.hokkaido.jp","mstdn.uec.tokyo","7144.party","don.wakamesoba98.net","minidon.bacardi55.org","mstdn.nametaketakewo.net","gamecreate.mstdn.cloud","m.rweekly.org","mastodon.chotto.moe","mstdn.techdrive.top","mastodon.toycode.com","mastodon.centiworks.com","mastodon.titoux.info","mastodon.lithium03.info","vmrpc.net","mst.ongstar.jp","mdn.hinaloe.net","mstdn.gaijinsize.com","mastodon.hekki.info","yontengop.com","mstdn.nakayuki.net","mastodon.hakoai.com","toot.oekaki.st","bitcoinadon.social","dq10.online","social.nofftopia.com","m.v.nu","mstdn.noritsuna.jp","kerokero.rororo.xyz","mastodon.zunda.ninja","z-socialgame.mstdn.cloud","4com.jp","vocalodon.net","gensokyo.cloud","ika.queloud.net","don.chakuriki.net","mastdn.lovesaemi.daemon.asia","i.write.codethat.sucks","spooky.pizza","ecodigital.social","jp-mstdn.com","mastodon.iot.tokyo","mstdn.soysoftware.net","chitose.moe","kinky.business","mstdn.nemsia.org","xn--zck4ad5f2e.jp","mellified.men","toot.redmine.jp","mastodon.yuritopia.net","castodon.jp","mstdn.cafe","ostatus.isidai.com","waraiotoko.net","mstdn.masuei.net","mstdn.sanin.club","mstdn-jp.site","social.qunagi.net","mstdn.9uelle.jp","mastodon.burnworks.com","vkdn.jp","mstdn.osaka","kemonodon.club","mastodoom.social","toot.pm","m.loovto.net","social.irrwitz.com","mstdn.ht164.jp","insoumis.social","wandering.shop","don.mfz.jp","pritter.tk","ifrit.gaia.ff14-mstdn.xyz","tokyo.mastodon-servers.net","horiedon.com","mstdn.yjsnpi.nu","vastodon.com","mstdn.nanamachi.net","takahashi.social","mastodon.undernet.uy","mstdn.tinko.club","otajodon.com","mstdn-d.info","mstdn.madpainter.info","manhole.club","sn.angry.im","mastodont.cat","otogamer.me","moe.neon.moe","japaon.cf","mstdn.syoriken.org","gigamastodon.com","domdom.tokyo","yudetarou.club","aidon.club","m.massy.city","pouet.couchet.org","mstdn.mechkey.jp","catdon.life","mstdn.ernix.jp","mstdn.awa.sfc.keio.ac.jp","unnerv.jp","is.a.qute.dog","mastodon.29lab.jp","mstdn.serv-ops.com","mstdn.ropo.jp","mastodon.robotstart.info","mastodon.p2pquake.net","gunmastodon.com","twingyeo.kr","mastodon.crazynewworld.net","mastodon-srv.gq","eletusk.club","mstdn.nere9.help","mastodon.etalab.gouv.fr","yukari.cloud","mastodon.machique.st","ery.kr","don.techfeed.io","avidol.jp","oriwebdon.com","friends.nico","mastodon.gifclip.info","mdn.crows.tokyo","social.spiwit.net","djanzu.tokyo","toot.tibidoo.com","mstdn.fm","mstdn.togawa.cs.waseda.ac.jp","mastodon.to","tusk.schoollibraries.net","fgochiho.vip","m.okadajp.org","mstdn.awm.jp","mstdn.guru","mastd.racing","mastodon.ka0.co","mastodon.m0t0k1ch1.com","elephant.bike","mstdn.okumin.com","gadget.inpocket.net","ro-mastodon.puyo.jp","mstdn.golf","omanko.porn","tuner.1242.com","funfunmstdn.tokyo","mastodon.poker","mstdn.creatorsnight.com","don.msng.info","social.celabs.com","3.nu","mstdn.kaonikki.tokyo","mastodon.mnetwork.co.kr","iamastodon.gifu.jp","vapers.jp","mastodon.ingress-enl.jp","social.dropbear.xyz","mstdn.glorificatio.org","noupti.me","mastodon.niu.ne.jp","social.oupsman.fr","aqua-graphic.blue","mastodol.jp","mastodon.crazypanda.fr","mstdn-football.jp","mstdn-kanazawa.jp","mstdn.voyage","ranobe.net","mimumedon.com","mastodon.nara.jp","mikumikudance.cloud","mastodons.jp","md.yutasan.co","mastdon.amazedkoumei.com","mist.so","madomadon.net","mstdn.klg-tree.jp","mastodon.sngsk.info","photodn.net","haruhi-mstdn.club","pouet.chouech.org","dtp-mstdn.jp","md.jigensha.info","mangadon.net","mathtodon.com","pouet.dachary.org","mastodoll.net","mastodon.cosmicanimal.jp","society.oftrolls.com","mi.pede.rs","fanfare.horse","mastodon.expert","bookn.me","mastodon.crossfamilyweb.com","taruntarun.net","im.notreal.pw","happy-social-life.fudanchii.net","mstdn.hyogo.jp","social.alifein.tech","siege.rhino.cards","mstdn.mx","tetsugaku.place","mstdn.niigata.jp","technologeek.me","mn.kitetu.com","linuxrocks.online","mevo.xyz","august-don.site","mstdn.fy.to","mastodon.oita.jp","t.d65.xyz","ofuton.io","don.ekesete.net","social.kimamass.com","mastodon.lavergne.online","mrt.al","anime.mstdn.cloud","mstdn.fukuoka.jp","ffxiv-mastodon.com","ekuro.jp","mastodon.muage.org","mastodon.snowandtweet.jp","sldon.jp","engineered.space","hamtter.net","elict.net","jojomonvr.com","babuu.club","mi5.jp","mstdn.studio","mastodon.mfjt.jp","mastodon.linuxquimper.org","himastdon.club","open2.ch","cigarcabin.com","biwakodon.com","masatodon.click","kirby-fans.com","kabutodon.com","mastodon.sdf.org","jstd.me","saigodon.jp","sunshinegardens.org","mastodon.lemarchand.io","tutut.delire.party","charafre.noela.moe","syachiku.net","m.uncate.org","mammut.zasha.style","nishinomiya.in.net","summoners-riftodon.jp","mstdn-ac.ryukyu","mathtod.online","wizfox.jp","mental.social","chofudon.tokyo","yomidon.okinawa","shadowverse-mstdn.jp","eizodon.jp","teo.taiha.net","social.hyuki.net","social.matsuuratomoya.com","mastodon.850mb.net","mstdn.toaruhetare.net","fx-don.net","jeunesse.media","don.rabbit-house.me","babymetal.party","veah.cocoa.moe","mstdn.goziline.com","keiba.social","mstdn.gots9713.xyz","baraag.net","tusk.what.re","mofu.kemo.no","chibi.kemo.no","ediot.social","xn--wmq.jp","wowsdon.xyz","mstdn.superspeed-fall.com","www.nekotodon.com","eigadon.net","mstdn.i-red.info","niigata.minnna.xyz","recode.macro.tokyo","mastodon.training","mastodon.sail42.fr","clacks.link","s.ovalerio.net","under-bank.blue","mstdn.dasoran.net","kirapower.ichigo-hoshimiya.com","tekkadon.manimani.cc","mastodon.uy","mastodon.fyi","mstdn.it-infra.jp","mstdn.yantene.net","mstdn.debate.info-labs.jp","mstdn.monster-girl.homelinux.net","mstdn.hanabi-life.net","pso2.club","precure.ml","mstdn.idolhack.com","yakyudon.net","mastodon.bitbank.cc","mstdn-vn.com","shigadon.com","mstdn.nagasaki.jp","don.akashi.cloud","mastodon.oss.nagoya","matchdon.com","konkat.jp","leaf.style","mastodon.noraworld.jp","animefun.jp","39sounds.net","urawareds.org","friends.tennis","sakaba.space","mastodon.osaka","www.mofgao.space","mstdn.lalafell.org","pachi.house","kmmtn.com","forexdon.org","mastodon.nl","go-newbie.club","home.aqraf.tokyo","jitakudon.com","flower.afn.social","kakudon.com","mstdn.ipz.jp","lgbt.io","masatodon.jp","mastodon.aquarla.net","mstdn.trashkids.org","noisebridge.social","mstdn.kwmr.me","mastodonchile.club","social.coop","dhtls.net","social.paco.to","mstdn-minpaku.jp","dartsdon.jp","umastodon.jp","emojidon.global","social.konosuke.jp","mastodon.macsnet.cz","scholar.social","tvdon.rt-trend.jp","mstdn-bike.net","kurage.cc","ostatus.yajamon.xyz","fudanshi.org","shkval.net","mastodon.mit.edu","mathstodon.xyz","social.vincentux.fr","mastodon.on-o.com","ostatus.shade3d.jp","donsuke.biz","mammout.bzh","mikado-city.jp","catdon.jp","tsuruga.net","dramadon.net","o.kagucho.net","everydon.com","livers.jp","mediartodon.net","mastodon.medieval.jp","ostatus.taiyolab.com","status.bcarlin.net","social.tinysubversions.com","utodon.jp","toot.forumanalogue.fr","toot.matereal.eu","mstdn.lyker.jp","mayodon.club","xmstdn.com","carma.red","nomlishdon.racing-lagoon.info","mastodon.izzz.fr","risingsun.red","mastodon.gargantia.fr","fr.osm.social","social.touha.me","mastodon.social","trickle.ink","mstdn2017.club","kitty.town","urvogel.club","mstdngirls.net","pouet.apdu.fr","mastodon.swordlogic.com","nagayodon.com","mastodon-lyontech.fr","mstdn.okinawa.jp","naos.crypto.church","mastodon.3bk.jp","mel.social","mastodos.com","cosp.la","warubure.online","masatodon.com","mstdn.ytgrsua4.net","ashikaga.link","training-fitness.fun","lilydon.com","todon.nl","ngndn.jp","mastodon.randulo.com","mr.am","mastodon.fu-jp.net","introvert.party","mstdn.hisurga.com","mastodon.matrix.org","elekk.xyz","toot.psyco.fr","lomo.mstdn.tokyo","xn--zckuao5dze.jp","podcast.style","forum.manga.tokyo","hydroxyquinol.net","hige.alterna-cloud.com","killmi.st","mastodon.shuuten.org","voe.social","mastodon.teamblackberry.jp","mstdn.sanin.link","mastodon.plein.org","mastodon.fishing","mstdn-babymetal.com","mstdn-uragi.jp","kancolle-yokosuka.xyz","spod.ca","mstdn.tako774.net","mstdn.b-shock.org","mstdn.a-tak.com","hfukuchi.masto.host","mstdn.zuyadon.tk","mastodon.iut-larochelle.fr","mstdn.chordwiki.org","mastodon.internot.no","kurakake.net","gundam.masto.host","nice.toote.rs","cuttlefi.sh","cookdon.com","ue4-mstdn.tokyo","mastodon.partecipa.digital","mstdn.onl","toot.blue","shimaidon.net","mastodon.aventer.biz","don.h3z.jp","gamelinks007.net","mstdn.felice.biz","mstdn.felice.biz.","ostatus.blessedgeeks.org","jpnews.site","social.ponyfrance.net","sandbox.skoji.jp","saitama-stdn.com","equestria.social","mastodon.neilcastelino.com","www.ksu-mastodon.com","social.over-world.org","labotadon.net","mastodon.kebree.fr","selfy.army","unityjp-mastodon.tokyo","scalie.club","kaisendon.asmodeus.red","mastodon.nestegg.net","mstdn.wildtree.jp","natudon-outdoor.net","toot.ordinarius-fectum.net","foodon.jp","basstdn.jp","ieji.de","writing.exchange","sanam.xyz","subculdon.com","monstodon.info","pochi46.com","clodostr.at","mstdn.yoshimov.com","mastodon.infra.de","john-mastodon.scalingo.io","mastodon.latransition.org","mstdn.tokyocameraclub.com","insolente.im","janogdon.net","musicdn.jp","redwombat.social","rugdon.fun","banthamilk.blue","mstdn.okayama.jp","solo-outdon.club","ostatus.blessedgeeks.jp","s.brined.fish","mstdoujin.net","emacs.li","compass-community.f5.si","uldhaar.dk","mastodon.potager.org","social.noff.co","765ml.com","botdon.net","mastodon.lignux.com","gingadon.com","danshudon.jp","mstdn.kyoto","mastodon.home.js4.in","lfsr.net","nicra.fr","glamdon.com","moeism.me","mastodon.dissem.ch","chiawase.tokyo","social.alabasta.net","mastodon.wakayama.jp","mastodon.acc.sunet.se","natudon-fishing.net","don.matchy.jp","mstdn18.jp","tgp.jp","mediadon.jp","doll.social","mostodon.info","mstdn.taiyaki.online","queer.town","mastedm.club","miestodon.com","social.pueseso.club","md.paoon.social","moseisley.club","east.mstdn.tokyo","mastodon.diglateam3.com","hckr.no","ukrainian.social","mastodon.scoffoni.net","durel.org","social.bluecore.net","aigisdon.net","moe.cat","mstdn.kanagu.info","sldon.com","mstdn.fujii-yuji.net","mastodon.moshsh-mate.com","party.ochakai.moe","social.arbleizez.bzh","nandon.cc","social.lafermenumerique.com","mstdn.kwmr.info","m.moriya.faith","m.pira.jp","cocoronavi.net","mastodon.e217.net","mstdnsrv.moe.hm","mstdn.bizocean.co.jp","mastodon.redbrick.dcu.ie","nfg.zone","the.wired.sehol.se","sakoku.jp","mastodon.jpages.eu","coales.co","kemono-friends.masto.host","social.conglomer.net","matitodon.com","acg.mn","thinkers.ac","mastodon.ftfl.ca","gonsphere.tk","qiitadon.com","tvdon.tv","lou.lt","mstdn.aquaplus.jp","obitsudon.midyuki.net","mastodon.beerfactory.org","tegedon.net","aruk.as","mast.eu.org","mstdn.ibaraki.jp","plasticmodels.tokyo","mastodon.gza.jp","yamastodon.jp","kabudon.jp","m6n.kigurumi.fun","imaginair.es","quizdon.com","575don.club","mast.kaikretschmann.de","nagoyadon.jp","googoldon.net","mstdn.imoimo.xyz","chibadon.jp","social.pretzlaff.co","mstdn.mini4wd-engineer.com","gamba.osaka.jp","christodon.com","gamejam.site","angel.innolan.net","m.geraffel.net","mastodonargentina.club","mstd.tokyo","chorus.space","mastodon.mrtino.eu","social.backtick.town","mastodon.dotopia.dk","mstdn.mochiwasa.xyz","techdon.info","mastodon.kitamurakz.com","rikadon.club","social.48bin.net","social.strog.org","mastodon.matcha-soft.com","mastodon.osyakasyama.me","mdx.ggtea.org","t.con.sh","nobody.social","w3c.social","kurosawa-ruby.xyz","blackice.online","toot.plus.yt","theferret.social","learn-english.site","deep-learning.site","mammouth.inframed.net","mastodon.evolix.org","bcn-users.degica.com","real-escape.jp","elephant.bluecore.net","hodl.city","malfunctioning.technology","music.pawoo.net","ipv6.social.konosuke.jp","gonext.gg","mastodonte.me","orlando.community","yukarin.club","persadon.com","mastodon.starrevolution.org","claristdon.net","gdrsocial.it","m.socialjustice.engineering","mstdn.asami.red","mastodon.horde.net.br","rubber.social","ziroh.be","raccoon.network","photog.social","nerds.party","social.chinwag.im","wasteland.pro","mstdn.dyndns.org","hokutodon.co","anitwitter.moe","gelt.cz","kashiwadon.net","julika.jp","animedon.tk","kaisendon.masto.host","social.chilliet.eu","borderline.mooo.info","sdmesh.social","fur.cloud","social.wiuwiu.de","metalhead.club","this.mouse.rocks","catgram.jp","kawasaki-city.social","mastodon.capitaines.fr","foresdon.jp","monsterpit.net","kirishimalab21.xyz","social.arnip.org","bookwor.ms","succ.faith","msdn.yourrhythm.jp","anarchism.space","iwatedon.net","kiminona.co","mastodon.com.pl","ika.julika.jp","cybr.es","mstdn.miyazaki.jp","edge.mstdn.jp","guimik.fr","wug.fun","mstdn.lalafell.org.","mstdn.phonolo.gy","haupt.bahnhof.cz","mastodonian.city","spladoon.yuzulia.com","toot.ordinarius-fectum.net.","iyher.club","touhey.org","esperanto.masto.host","social.mecanis.me","mstdn.cygnan.com","jubi.life","social.mochi.academy","mastodon.therianthro.pe","phirat.club","toot.si","instance.business","acid.wtf","idolish7.fun","ykzts.technology","lordinateur.tech","social.fractalco.re","pleroma.soykaf.com","manhater.io","epsilon.social","mangadon.info","nantes.social","reallygay.party","mastodon.kosebamse.com","fosstodon.org","togart.de","social.treyssatvincent.fr","cosi.town","mstdn.lesamarien.fr","cervidae.space","chirpi.de","kokokokko.com","social.sakamoto.gq","hearthtodon.com","asonix.dog","jesusinthe.club","handon.club","ichiji.social","cmx.im","pokemon.mastportal.info","mastodon.productionservers.net","intersect.hackershack.net","legfr.social","ilove.mochi.academy","masto.donte.com.br","t.b612.me","chiji.space","overthinking.club","social.talk.coffee","nulled.red","tootcn.com","esp.community","puter.games","mast.tayori.org","mstdn.ryanak.xyz","mstdn.thenetherlands.jp","swift.language.jp","knzk.me","birdsite.link","md.cryo.jp","social.ntic.fr","qdon.space","playvicious.social","moose.land","drg.im","voluntary.world","creative.rabbinicorn.com","ipno.us","mstdn.se","syui.ml","tomitodon.huideyeren.info","mattips.online","mastodon.floripa.br","assortedflotsam.com","toot.cerebralab.com","hitlers.win","mess.casa","soscet.network","bangdream.space","m.hxbus.net","ltch.fr","occult.camp","wkfg.me","mao.daizhige.org","trans.town","toot.chat","mastodon.yamaken.jp","sigint.sx","mastodon.kamunagara.org","mastodon.hong.io","uri.life","iscute.ovh","haxors.com","mastodon.mail.at","mastodon.baeck.at","mastodonserver.se","mstdn.ephemeral-arcadia.jp","social.sdr.haus","rumia.xyz","canislupus.im","toot.okaris.de","dragon.style","feralkin.com","muenster.im","www.chatalk.club","chikuwa.sweak.net","dutchxs.com","mstdn.zoddo.fr","m.paulbutler.org","mammut.buzz","mn.ms","rthelp.rta.vn","android-user.club","mastodon.rta.vn","mstdn.m4sk.in","nokotaro.com","social.netzkombinat.su","gldon.hostdon.jp","mastodon.funigtor.fr","m.devolio.net","scicomm.xyz","md.xps2.net","ali.delbertbeta.cc","robloxcommunity.social","chaosphere.hostdon.jp","gamers.social","bigdoinks.online","mastodon.gamedev.place","squid.cafe","stoneartprod.xyz","unique-inet.tokyo","tech.lgbt","pnw.social","planet.moe","hispagatos.space","hodl.social","cofe.social","social.lab.cultura.gov.br","wxw.moe","mastodon.lolisandstuff.moe","mastodon.sergal.org","libertarian.chat","not.phrack.fyi","sozial.derguhl.de","cutie.space","ancr.club","newtype.institute","0.unicomplex.co","mast.datamol.org","cuddleso.me","kirishima.cloud","mastodon.sk","kalebporter.club","empathytech.net","gouhuoapp.com","chablis.social","zerohack.xyz","m.bonzoesc.net","social.buffalomesh.net","mastodon.garbage-juice.com","wales2600.com","social.cofe.space","weebs.moe","social.koyu.space","mstdn-nct.com","mastodon.microdata.co.uk","toot.kif.rocks","campaign.openworlds.info","fivewords.uk","mastodon.schlenz.ruhr","mastodon.waffle.tech","mstdn.kigurumi.fun","ma.luna.fyi","mstdn.xn--q9jyb4c","furry.wtf","sckc.stream","social.tuto-craft.com","schlechter.host","social.chinwag.org","cb.ku.cx","high.cat","queer.cloud","ruhr.social","the.resize.club","social.tilde.team","hackers.social","toot.timecube.club","mstdn.xn--h1ahnbk7d.xn--p1ai","salty.vet","yuzulia.xyz","fla.red","mastodon.retrodigital.net","tootme.de","social.that.world","zenet.work","frell.co","m.moe.cat","mastodon.radiofreerobotron.net","masto.cryptoworld.is","bsd.network","gazette.live","republikrenyonez.sytes.net","mamut.social","eldritchworld.nom.es","mastdc.com","gamemaking.social","theboss.tech","mastodonten.de","m.hitorino.moe","el-ktm.com","mastodon.daiko.fr","mastodon.desord.re","bam.yt","toot.iwh12.jp","steamstdn.com","tobane.m.to","innocent.yukimochi.io","doronko.club","3dscapture.net","mastodon.immae.eu","retro.social","hikarin.m.to","p.kokolor.es","don.mamemo.online","social.eyesight.jp","mst.idsdt.com","john.town","pleroma.knzk.me","poils.pachyderme.net","fox.masto.host","fsdon.com","mstdn.monappy.jp","pcgame.jp","beer.m.to","v22017122292958322.goodsrv.de","mir.hostdon.jp","kamiyacho.net","darkest-timeline.com","dev.glitch.social","oxidized.systems","pom.masto.host","pouet.chapril.org","rainyman.jp","nightmare.zone","muwiter.m.to","dnfc.fun","mstdn.haru2036.com","atdotatdotat.at","oyakodon.m.to","paku.m.to","mstdn.mimikun.jp","mstdn.jp.net","mstdn.prfm.jp","pico8.social","social.denkbrettl.org","kttsakaba.net","mstdn.ntk.so","typing.sexy","howl.m.to","cxt.masto.host","mushroomkingdomdon.m.to","rungirls.run","thezombie.net","ostatus.yoh2.ddo.jp","social.elbmatsch.de","themepark.m.to","social.farend.co.jp","sc.sigmaris.info","mastodon-techdrive-staging.herokuapp.com","mstdn.albormentum.com","squope.net","mstdn.image-space.info","beyblader.top","md.regastream.com","huwa.m.to","azuchi.m.to","unkomaker.m.to","mastodon.prostreamers.net","anisodon.jp","mastodon.recurse.com","torus1111.m.to","thechurchofmemes.com","mastodon.binatang.nl","digilife.club","xn--kckk1cy297bor8a.jp","m.livetube.cc","resistance.hostdon.jp","hwdon.jp","mirohli.m.to","m.tatapa.org","tokotodon.m.to","mstdn.precure.fun","lab.oresys.nagoya","edge.taruntarun.net","taketodon.com","ple.ggtea.org","arm.m.to","m.rutan.info","mst.m544.net","omoch.m.to","puredon.matcha-soft.com","oidemasetodon.com","social.hideo54.com","don.m2hq.net","masto.tech","ehr.m.to","pom.m.to","sukadon.m.to","md.rhythmania.net","xxx.m.to","neumann.m.to","kiwaitsu.m.to","md.arg.vc","ore.m.to","napear.m.to","toot.lain.moe","josephburnett.social","toot.wiredpunch.com","asnas.m.to","typrout.ml","pleroma.kazuhiko.kitamura.name","mastodon.suncha.biz","pleroma.nakanod.net","morningcross.m.to","setl.ist","ohmidon.m.to","nonsta.m.to","iwami-mastodon.herokuapp.com","mag-mstdn.tki.jp","kiraako.work","nadesiko-users.info","pleroma.kitamurakz.com","mountainpeoples.m.to","ma.strangeworld.jp","estpls.m.to","shadowverdon.m.to","unidon.asmodeus.red","bangdream.m.to","local.iwamidon.tech","vawn.m.to","c2bdon.net","kent.m.to","scp.m.to","mastodon.gion.me","pleroma.playground.ws","mastodon.hakai-macaron.com","mastodon.sinkuu.xyz","mastodon-toyama.xyz","sabowl.m.to","mstdn.shizuoka.jp","kagerw.m.to","unity.m.to","mstdn.kemonox.jp","pantadoon.m.to","mastodon.lndvll.se","teatime.afternoonrobot.co.uk","mstdn.a-apple.net","md.net-p.org","mastodont.herokuapp.com","mastodon.lerelaisdupatriote.fr","snap.photo","paradise.engineering","hemohemo.m.to","mstdn.sk","lux.blue","soogle.m.to","yougaku20c.m.to","social.ash.bzh","hdhdhd.m.to","planner.social","yume.social","alpc-island.m.to","mstdn.yamachan.org","vegetadon.tokyo","mastodon.atikoro.net","pleroma.vocalodon.net","pompom.m.to","newtro.club","c-don.net","nerdica.net","mercury.social","h.ftqq.com","whiskycat.m.to","flashfic.stream","mstdn.bari-ikutsu.com","mdon.ee","weird.tf","playingwithworms.org.uk","mast.iankelling.org","mast.udon.moe","m.sirousa.me","cathuman.m.to","akashiensis.com","mastodon.babycastles.com","masto.fine.moe","japanweather.m.to","fnordica.de","mastodon.forza7.jp","m.themsp.org","raven.dog","ojitabi.club","bloodmountain.herokuapp.com","humuu.m.to","mcr.cool","clashroyalemastodon.com","mastodon.technick.org","rettiwtkcuf.social","social.korot.ru","mastodon.z27.ch","mstdn.mk39.xyz","newyorkdon.net","maron.blue","semi.m.to","friendica.me","comico.m.to","myc.m.to","fvhp-run.herokuapp.com","md.gloon.jp","mastodon.deafpros.com","negipan.m.to","cyber.cafe","gla.fit","cat.m.to","akiba-fan.com","znark.us","pouet.coazergues.info","quod.pl","nonsensoleum.net","igreally.social","mstdn.wood-built21.net","io.bennyp.org","knkr.m.to","social.gaos.org","mstdn.centossrv.com","okinawa-mstdn.okinawa","social.willistonschools.org","kernel32.de","arrowp5210.m.to","mstdn.naruh.com","mmodon.online","ascraeus.org","suku.m.to","mstdn.sh","mastodon.digitalkr.am","droogz.razvrat.org","msd.alohaloa.com","social.icewind.nl","mastodon.anti-globalism.org","mastodon.danbruno.net","motorsports.m.to","nanasi.m.to","sweettitties.scalingo.io","social.xmob.me","m.sysi.work","tooru.m.to","mastodon.nakanod.net","jonproulx.com","fukuoka.m.to","syui-ml.herokuapp.com","micro.koray.al","kimonosou.tokyo","mastodon.bertel-numerique.re","mastodon.newtown.chiba.jp","mstdn-kr.com","mastodon.spdns.org","comicsofcolor.club","miblog.life","758.fm","tantor.online","testodon.herokuapp.com","social.historyhorde.com","route66.social","co-mastdn.ga","mikuspot.net","raim0713.m.to","bona.space","nildon.com","toot.playground.ws","remicck.club","mstdn.ninja","mstdn.nahcnuj.work","mastodon-jp.org","mastodon.ebiryu.tech","millionimas.m.to","sisuclub.com","potaodon.audio","siidon.lab-kadokawa.com","ktstdn.m.to","pokedon.org","mstdn.yyuuiikk.org","awaodori.tokyo","yamagadon.com","beyblade.m.to","social.device5.co.uk","the-hash.m.to","mstdn.liliso.com","fam.vermeulen.id.au","talk.econudes.org","wabi.m.to","crusaders.m.to","fuzjkodon.m.to","otomachi.m.to","kkczjpn.m.to","nt50tec.m.to","magenta.click","owata.m.to","indyjp.club","mstdn-ent.com","api.m.to","yumejo.m.to","km-connect.org","metaller.m.to","mana9356.m.to","mofu.m.to","hyoga9f.m.to","zenyasai.g-fukurowl.club","00x.club","ysfh.m.to","mstdn-newprofession.jp","mstdn1.ssc-web.net","mstdn.sastudio.jp","hsgw.m.to","junkhub.org","mastodoooooon.herokuapp.com","walrein.m.to","syamuwatching.m.to","boyslove.jp","plrm.ht164.jp","oniko-branch.moe","v-hills.m.to","mogumogucombo.m.to","test.afn.social","atasinti.hostdon.jp","chicken.m.to","nutria.m.to","qtdon.m.to","mstdn.takanory.jp","home.m.to","stcpt.com","sw-mastodon.herokuapp.com","35o.poker","mastodon.chilos.jp","koya.m.to","mazzo.masto.host","mstdn.bitzeny.link","social.jp-mstdn.com","pan2.m.to","mobtodon.m.to","www.azuki-zenzai.net","gradiect.m.to","test.animedon.tk","miso.social","fehacking.xyz","sio.masto.host","uncensored.masto.host","balkan.fedive.rs","yutacar.info","servercan.xyz","odaidon.m.to","mst.k7mc.xyz","tokyoidolfestival.m.to","helloproject.m.to","igreally.masto.host","kancolle.social","mstdn.alnair.blue","nikatsudon.m.to","motodn.jp","turezure.m.to","basil.asria.jp","md.tret.jp","tera.m.to","kuncheff.social","tty.pw","xn--n8jycee5a4lmeyevltfzc2sja1jw105ewz3i.club","mstdn.s7t.de","taconiji.m.to","tibibibimbap.m.to","m.anyhu.gs","mastochizuru.xyz","nejiamasi.com","mastoidoljp.m.to","chat.cdstm.ch","social.ioserv.space","cornix.hostdon.jp","pangeon.jp","mstdn.ikasekai.com","friendica.sonatagreen.com","pachyderm.herokuapp.com","hqpf.site","guu.so","karakara.m.to","boss.taxi","satzcoal.com","listen.gallery","vidja.social","qatuno.de","toots.benpro.fr","timshomepage.net","empty.cafe","tooter.masto.host","mst-roa.m544.net","icmstdn.com","m.umbriel.fr","mastodon.mattjon.es","teacoffee.life","lianiis.m.to","makerdon.org","selfcare.masto.host","mastodon.dregin.com","crunchywatch.uk","voluntaryaction.network","sarubobo.red","cooperdon.com","mstdn.okin-jp.net","st.foresdon.jp","test.tegedon.net","piano.masto.host","bicyclemstdn.jp","social.gwadalug.org","happy-oss.y-zu.org","layer8.space","hub.sakuragawa.moe","mastodon.hakimus.de","blabla.maravitti.fr","mastodon.nekomimi.jp","postdon.com","mastodon.mocademia.jp","neritodon.xyz","sizedon.com","msyk.m.to","naf.m.to","sagatodon.m.to","mstdn.new-game.pw","md.sencic.com","toot.host","meow.m.to","t.cypv4.com","elephant-bike.herokuapp.com","t.unihubs.com","mastodon.starling.zone","mstdn-heroku.herokuapp.com","kokuchidon.net","mastodon.dominicdewolfe.com","aws.afn.social","social.literati.org","m.mtjm.eu","basictomonokai.m.to","mastodon.dustinwilson.com","mastodon.thequietplace.social","ostatus.lardbucket.org","hi.spooky.camp","mastodon.owls.io","pleroma.firechicken.net","social.timshomepage.net","social.ra-phi.ch","social.qwerjk.com","mastodon.h-sund.nu","social.lamowski.net","theoria.m.to","pleroma.distsn.org","mstdn.kitamurakz.com","nitic-mstdn.hostdon.jp","w3.freechinaweibo.com","toot.turbo.chat","coders.social","relativity.cafe","ps.s10y.eu","donphan.social","djs.social","mstdn.userzap.de","xn--69aa8bzb.xn--y9a3aq","ultrix.me","hax0rz.lol","sleeping.town","soc.freedombone.net","www.freechinaweibo.com","betoviet.m.to","mtn.gnlk.ovh","glaceon.social","mstdn.syoshida.org","social.mofu2charger-listenradio.net","linaro.tech","cosplay.m.to","digitalsoup.eu","social.symphonie-of-code.fr","kyunkyun.moe","mastodon.mynameisivan.ru","tecce.club","social.dxlb.nl","cmx.famousedu.com","hakomas.cf","dev.kirishima.cloud","dance-dance-dance.space","smj.m.to","yuikaoridon.m.to","mastodon.gamecircle.nova.0am.jp"];


        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_instance_url');
        // output the field
        ?>
        <input type="text" placeholder="mastodon.social" list="mInstances" name="mastodon_instance_url" value="<?= isset($setting) ? esc_attr($setting) : ''; ?>">

        <?php 
        //Autocomplete
        echo '<datalist id="mInstances">';
          foreach($mInstancesArray as $row => $singleInstance){
            echo '<option value="'.$singleInstance.'" />';

          }
        echo '</datalist>';

        $buttonEnabled = $setting != "" ? "" : "disabled";

        echo '<input id="userAuthButton" type="button" value="'.esc_html__('Login', 'autopost-to-mastodon').'" class="button" '.$buttonEnabled.'>';
                echo '<div id="mAuthMessage"></div>';
                ?>
 <div id="tokenEnterForm">
        <div>
            <input type="text" placeholder="fokwnmf3lwfd2sdfa2le3dwlsdmq32324we321fw" name="mastodon_server_token">
            <input id="getBearerButton" type="button" value="<?=esc_html__('Enter Token', 'autopost-to-mastodon');?>" class="button">
        </div>
        <div> 
            <?=esc_html__('Enter the token from the popup. If the popup is not opening visit the following url', 'autopost-to-mastodon');?>:
        </div>
        <div>
            <a href="" id="tokenPopupURL" target="_blank"></a>
        </div>
    </div>
                <?php

    }

// email
    function mastodon_user_auth_func()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_creds');
        // output the field
        /*
        <input type="text" name="mastodon_token" placeholder="sk9f3cb61a03778fa4f67hx215dd1b29bc12053fa4953daa55dd9178224e1d1be" value="<?= isset($setting) ? esc_attr($setting) : ''; ?>">*/

        $buttonEnabled = ($setting != "") ? "" : "disabled";
        $testmsg = ($setting == "") ? "" : esc_html__('By clicking the "Test Settings" Button the following toot will be tooted to your Mastodon profile:', 'autopost-to-mastodon').' "'.esc_html__('This is my first toot with the Autopost to Mastodon Wordpress Plugin', 'autopost-to-mastodon').' https://wordpress.org/plugins/autopost-to-mastodon/"';

        echo '<input id="testConnectionButton" type="button" value="'.esc_html__('Test Settings', 'autopost-to-mastodon').'" class="button" '.$buttonEnabled.'>';
        echo '<div id="testConnectionMessage">'.$testmsg.'</div>';
    }

 

 
/**
 * Behavior Settings 
 */
 
// Section Title
    function mastodon_behavior_description_func()
    {
        //xesc_html_e('Configure the Plugin Behavior', 'autopost-to-mastodon');
     }
 
// Server URL
    function mastodon_post_on_update_func()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_post_on_update');
        // output the field
        ?>
       
        <input type="checkbox" id="mastodon_post_on_update" name="mastodon_post_on_update" value="1" <?php echo checked( 1, $setting, false ) ?>/>

        <?php
    }

/**
 * Post Settings 
 */
 
// Section Title
    function mastodon_post_description_func()
    {
        //xesc_html_e('Configure the Plugin Behavior', 'autopost-to-mastodon');
     }
 
// Hastags
    function mastodon_post_hashtags()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_post_hashtags');
        // output the field
        ?>
       
        <input type="text" name="mastodon_post_hashtags" placeholder="#wordpress #autopost #magic" value="<?= isset($setting) ? esc_attr($setting) : ''; ?>">

        <?php
    }

    // visibility
    function mastodon_post_visibility()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_post_visibility');
        // output the field
        ?>
       
        <input type="radio" name="mastodon_post_visibility" value="public" <?= $setting== "" || $setting=="public" ? 'checked' : ''; ?>> <?=esc_html("Public");?><br>
        <input type="radio" name="mastodon_post_visibility" value="unlisted" <?= $setting=="unlisted" ? 'checked' : ''; ?>> <?=esc_html("Unlisted");?><br>
        <input type="radio" name="mastodon_post_visibility" value="private" <?= $setting=="private" ? 'checked' : ''; ?>> <?=esc_html("Private");?>

        <?php
    }

    // post format
    function mastodon_post_format()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('mastodon_post_format');
        // output the field
        ?>
       
        <input type="radio" name="mastodon_post_format" value="0" <?= $setting=="" || $setting=="0" ? 'checked' : ''; ?>> <?php echo esc_html("Title") . " ".esc_html("Link")." ".esc_html("Hashtags");?><br>
        <input type="radio" name="mastodon_post_format" value="1" <?= $setting=="1" ? 'checked' : ''; ?>> <?php echo esc_html("Title") . " ".esc_html("Content")." ".esc_html("Link")." ".esc_html("Hashtags");?><br>

        <?php
    }




//Add Settings Actions
    add_action('admin_init', 'mastodon_settings_init');




//Add the plugin menu to settings menu
    function mastodon_menu() {
        add_options_page(
            "Mastodon Autopost Settings",
            esc_attr__('Mastodon Autopost Settings', 'autopost-to-mastodon'),
            "administrator",
            "mastodon-settings-page", 
            'mastodon_settings_page'
        );
    }

//Wordpress Standart Settings page
    function mastodon_settings_page() {
         // check user capabilities
         if ( ! current_user_can( 'manage_options' ) ) {
            return;
         }




         
         /* add error/update messages
         
         // check if the user have submitted the settings
         // wordpress will add the "settings-updated" $_GET parameter to the url
         if ( isset( $_GET['settings-updated'] ) ) {
         // add settings saved message with the class of "updated"
         add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
         }
         
         // show error/update messages
         settings_errors( 'wporg_messages' );*/
         ?>
         <div class="wrap">
             <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
             <form action="options.php" method="post">
                 <?php
                 // output security fields for the registered setting "wporg"
                    settings_fields( 'mastodon' );
                 // output setting sections and their fields
                 // (sections are registered for "wporg", each field is registered to a specific section)
                    do_settings_sections( 'mastodon-settings-page' );
                    
                 // output save settings button
                    echo '<input name="submit" id="submit" class="button button-primary" value="'.esc_html__('Save Settings', 'autopost-to-mastodon').'" type="submit">';
                 //Test settings button
                    echo '<div style="float:clear;"></div>';
                 ?>
             </form>
         </div>
         <?php
    }    

//Register menu 
    add_action('admin_menu', 'mastodon_menu');

/*
//Shortcut to settings page
    add_filter('plugin_action_links', 'mastodon_autopost_menu_shortcut', 10, 2);

function mastodon_autopost_menu_shortcut($links, $file) {
  

    if (is_admin()) {
        // The "page" query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals "myplugin-settings".
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=mastodon-settings-page">'.esc_attr__('Settings', 'autopost-to-mastodon').'</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

*/

?>
