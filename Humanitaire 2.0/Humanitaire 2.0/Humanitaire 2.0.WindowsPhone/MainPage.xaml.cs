using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
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

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkId=234238

namespace Humanitaire_2._0
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class MainPage : Page
    {
        public bool menuOpen { get; set; }
        
        public MainPage()
        {
            this.InitializeComponent();
            this.NavigationCacheMode = NavigationCacheMode.Required;
        }

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            // TODO: Prepare page for display here.

            // TODO: If your application contains multiple pages, ensure that you are
            // handling the hardware Back button by registering for the
            // Windows.Phone.UI.Input.HardwareButtons.BackPressed event.
            // If you are using the NavigationHelper provided by some templates,
            // this event is handled for you.
        }

        private void Image_Tapped(object sender, TappedRoutedEventArgs e)
        {
            if(this.menuOpen == true)
            {
                this.menu.Margin = new Thickness(-150,0,0,0);
                this.menuOpen = false;
            }
            else 
            {
                this.menu.Margin = new Thickness(0, 0, 0, 0);
                this.menuOpen = true; 
            }
        }

        private void TextBlockActu_Tapped(object sender, TappedRoutedEventArgs e)
        {
            this.Actualite.Visibility = Windows.UI.Xaml.Visibility.Visible;
            this.Contribution.Visibility = Windows.UI.Xaml.Visibility.Collapsed;
            this.Map.Visibility = Windows.UI.Xaml.Visibility.Collapsed;
            this.menu.Margin = new Thickness(-150, 0, 0, 0);
        }

        private void TextBlockContri_Tapped(object sender, TappedRoutedEventArgs e)
        {
            this.Actualite.Visibility = Windows.UI.Xaml.Visibility.Collapsed;
            this.Contribution.Visibility = Windows.UI.Xaml.Visibility.Visible;
            this.Map.Visibility = Windows.UI.Xaml.Visibility.Collapsed;

            this.menu.Margin = new Thickness(-150, 0, 0, 0);
        }

        private void TextBlockMap_Tapped(object sender, TappedRoutedEventArgs e)
        {
            this.Actualite.Visibility = Windows.UI.Xaml.Visibility.Collapsed;
            this.Contribution.Visibility = Windows.UI.Xaml.Visibility.Collapsed;
            this.Map.Visibility = Windows.UI.Xaml.Visibility.Visible;

            this.menu.Margin = new Thickness(-150, 0, 0, 0);
        }
    }
}
