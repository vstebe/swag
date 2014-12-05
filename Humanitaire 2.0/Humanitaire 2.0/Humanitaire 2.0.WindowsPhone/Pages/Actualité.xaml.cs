using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net.Http;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Navigation;
using Windows.Data.Json;
using System.Net;

// Pour en savoir plus sur le modèle d’élément Page vierge, consultez la page http://go.microsoft.com/fwlink/?LinkID=390556

namespace Humanitaire_2._0.Pages
{
    /// <summary>
    /// Une page vide peut être utilisée seule ou constituer une page de destination au sein d'un frame.
    /// </summary>
    public sealed partial class Actualité : Grid
    {
        public Actualité()
        {
            this.InitializeComponent();
            ReadDataFromWeb();
        }

        async private void ReadDataFromWeb()
        {
            var client = new HttpClient(); // Add: using System.Net.Http;
            var response = await client.GetAsync(new Uri("http://turing.u-strasbg.fr/~glarmet/nuitinfo/tweets.php?word=ebola"));
            var result = await response.Content.ReadAsStringAsync();

            try
            {
                String json = result.ToString();
                JsonValue value = JsonValue.Parse(json);
                JsonArray array = value.GetArray();

                for (uint i = 0; i < array.Count; i++)
                {
                    JsonObject objet = array.GetObjectAt(i);
                    string time = objet.GetNamedString("time");
                    string text = objet.GetNamedString("text");
                    string author = objet.GetNamedString("author");

                    ActuItem item = new ActuItem(time, text, author);
                    this.pile.Children.Add(item);
                    this.pile.UpdateLayout();
                }
            }
            catch (WebException e)
            {
                return;
            }
        }


        void StackPanel_Loaded(IAsyncResult result)
        {
            HttpWebRequest request = result.AsyncState as HttpWebRequest;
            if (request != null)
            {
                try
                {
                    WebResponse response = request.EndGetResponse(result);
                    String json = response.GetResponseStream().ToString();
                    JsonValue value = JsonValue.Parse(json);
                    JsonArray array = value.GetArray();

                    for (uint i = 0; i < array.Count; i++ )
                    {
                        JsonObject objet = array.GetObjectAt(i);
                        string time = objet.GetNamedString("time");
                        string text = objet.GetNamedString("text");
                        string author = objet.GetNamedString("author");

                        ActuItem item = new ActuItem(time, text, author);
                        this.Children.Add(item);
                    }
                }
                catch (WebException e)
                {
                    return;
                }
            }
        }
    }
}
